
<link rel="stylesheet" href="css/website.css">

<!--<script src="../jquery-1.8.2"></script>-->

<script src="https://code.jquery.com/jquery-1.8.3.js"></script>
<script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
<script type="text/javascript">
    $(document).ready(function () {
        $('#group > #delgu').hide();
        $('#website > #delsite').hide();
        
        var $addarea = $('.addarea').html();
        
        $('div#group').mouseover(function(){
            var my = $(this);
            $(this).find(' #delgu').show();
                    $(this).find(' #delgu').hover(function(){
                        $(this).css({"background-color": "#B8B8B8"});
                    })
                    $(this).find(' #delgu').mouseout(function(){
                        $(this).css({"background-color": "#A1A1A1"})
                    });
                    
             $(this).find('#delgu').click(function(){
                 
                $.ajax({
                    url: 'delete_group.php',
                    cache: false,
                    dataType: 'html',
                        type:'POST',
                    data: "wgroup="+my.find('li').text()+
				  		  "&mid="+$('#mid').val(),

                    error: function(xhr) {
                      alert('Ajax request 發生錯誤');
                    },
                    success: function(response) {
                            // alert(response);
                           // $('#fragment-1').load("delete_group.php");
                              
                            $('#fragment-1').load('website.php');
                            
                            $(".add_ajax").load(location.href + " .add_ajax");
                    }
                }); 
            });
            /*$(this).find("#delgu").fadeTo("slow", 0.6); // This sets the opacity of the thumbs to fade down to 60% when the page loads

            $(this).find("#delgu").hover(function(){
                $(this).fadeTo("slow", 1.0); // This should set the opacity to 100% on hover
            },function(){
                $(this).fadeTo("slow", 0.6); // This should set the opacity back to 60% on mouseout
            });*/
        });
        $('div#group').mouseout(function(){
            $(this).find(' #delgu').hide();
        });
        
        /*$('#delgu').hide();
        $('#group').mouseover(function(){
            $('this > #delgu').show();
        });
        $('#group').mouseout(function(){
            $('this > #delgu').hide();
        });*/
    
        $('div#website').mouseover(function(){
            var wsmy = $(this);
            
            $(this).find('#delsite').show();
                    $(this).find(' #delsite').hover(function(){
                        $(this).css({"background-color": "#D4D4D4"});
                    })
                    $(this).find(' #delsite').mouseout(function(){
                        $(this).css({"background-color": "#BABABA"})
                    });
                    
                    
               $(this).find('#delsite').click(function(){
                    $.ajax({
                        url: 'delete_site.php',
                        cache: false,
                        dataType: 'html',
                            type:'POST',
                        data: "wsite="+wsmy.find('a').html()+
				  			  "&mid="+$('#mid').val(),

                        error: function(xhr) {
                          alert('Ajax request 發生錯誤');
                        },
                        success: function(response) {
                                // alert(response);
                               // $('#fragment-1').load("delete_group.php");

                                $('#fragment-1').load('website.php');
                                
                                $(".add_ajax").load(location.href + " .add_ajax");
                        }
                    }); 
                });
                    
        });
        
        $('div#website').mouseout(function(){
            $(this).find('#delsite').hide();
        });
        
        
//        本想做游標直至網站名，即可預覽該網址的畫面
//        $("div#website #tp").hide();
//        $('div#website a').mouseover(function(){
//           $(this).siblings(' #tp').show().css({'position':'absolute',
//               'z-index':'2','width':'12em','height':'15em',
//               'border':'1px solid #ccc'});
//           $(this).siblings(' #tp')(  $(this).attr("href") );
//        });
//        $('div#website a').mouseout(function(){
//           $(this).siblings(' #tp').hide();
//        });
//
    });
</script>

<?php
include_once 'conn/db_config.php';

//$addwebsite = htmlspecialchars( $_POST['websitename'] );
//echo $addwebsite;

// 建立 session
if (!isset($_SESSION)) {
  @session_start();
}


echo "<div id='container'>";

$i=0;
$sql = "select * from website_group where  enable>0  
					and mId='". $_SESSION['mid'] ."' 
    	group by gId asc";
$result = $mysqli->query($sql) or die("取群組資料錯誤");

while($row = $result->fetch_assoc() ){
    echo "<div id='group' name='div" . $i++ . "' >";
    echo "<div id='delgu' >X</div><div class='wtitle'>";
    echo "<li>".  str_replace("_nbsp-"," ",$row['gName'])  ."</li>";
    echo "</div>";
    echo "<hr>";
	
    $sql = "select * 
        from website
        where  gId>0  and gId='" . $row['gId'] . "' 
					and mId='". $_SESSION['mid'] ."'
        group by wId asc";
    $result2 = $mysqli->query($sql) or die("網址資料錯誤");
	
    while($row2 = $result2->fetch_assoc() ){
        echo "<div id='website'>";
        echo "<div id='delsite' >X</div><div class='wtitle'></div>";
        
        if( substr($row2['wSite'], 0, 4) != "http" )
                $row2['wSite']= "http://" . $row2['wSite'];
        echo "<a href='". $row2['wSite'] ."'>".$row2['wName']."</a><br/>";
        echo "</div>"; 
    }
    
    echo "</div>";
}
echo "</div>";

?>
