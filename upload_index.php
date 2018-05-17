<?php
 $mid = $_GET['mid'];

// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
// 尚未登入
if ( !isset($_SESSION['mid']) || !isset($_COOKIE["Us"]) || $_GET['mid']!=$_SESSION['mid']) {
  header('Location: logout.php');
}


include_once 'conn/db_config.php';

$mid = $_GET['mid'];

$sql = "select * from `image` where mId='".$mid."'";
$result = $mysqli->query($sql) or die("(myws_index)資料錯誤");

$screct = "1001".$mid.($mid*4);
$path = "upload/" . md5($mid) . "/" ;
?>
<style type="text/css">
#wrapper {
	width: 90%;
	max-width: 1100px;
	min-width: 800px;
	margin: 50px auto;
}

#columns {
	-webkit-column-count: 3;
	-webkit-column-gap: 10px;
	-webkit-column-fill: auto;
	-moz-column-count: 3;
	-moz-column-gap: 10px;
	-moz-column-fill: auto;
	column-count: 3;
	column-gap: 15px;
	column-fill: auto;
}
.pin {
    display: inline-block;
    background: #FEFEFE;
    border: 2px solid #FAFAFA;
    box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
    margin: 0 2px 15px;
    -webkit-column-break-inside: avoid;
    -moz-column-break-inside: avoid;
    column-break-inside: avoid;
    padding: 15px;
    padding-bottom: 5px;
    background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9);
    opacity: 1;

    -webkit-transition: all .2s ease;
    -moz-transition: all .2s ease;
    -o-transition: all .2s ease;
    transition: all .2s ease;
}
.pin img {
	width: 100%;
	border-bottom: 1px solid #ccc;
	padding-bottom: 15px;
	margin-bottom: 5px;
}

.pin p {
	font: 12px/18px Arial, sans-serif;
	color: #333;
	margin: 0;
}

@media (min-width: 960px) {
	#columns {
		-webkit-column-count: 4;
		-moz-column-count: 4;
		column-count: 4;
	}
}

@media (min-width: 1100px) {
	#columns {
		-webkit-column-count: 5;
		-moz-column-count: 5;
		column-count: 5;
	}
}

#columns:hover .pin:not(:hover) {
/*	opacity: 0.4;*/
}


#delpin{
    cursor: pointer;
    z-index: 1;
    float: right;    
    margin: 1px;    
    font-family: sans-serif;
    color: 	#EEEEEE;
    width: 15px;
    height: 17px;
    text-align: center;
    /*box-shadow: 1px 2px 6px rgba(0,0,0, 0.5);*/
    background-color:  	#CFCFCF;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    /*border: 2px solid #808080;*/
    
    display: none;
}
</style>
<script src="https://code.jquery.com/jquery-1.8.3.js"></script>
<script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
//$().ready(function(){
//    $('div#delpin').hide();
//    
//    $('div.pin a').mouseover(function(){
//        $(this).siblings('#delpin').show();
//        $(this).siblings('#delpin').click(function(){
//            alert($('.pin p').attr('id').val());
//             $.ajax({
//                 url: 'delete_image.php',
//                 cache: false,
//                 dataType: 'html',
//                     type: 'POST',
//                 data: "iName="+ $('.pin p').attr('id').val(),
//
//                 error: function(xhr) {
//                    alert('Ajax request 發生錯誤');
//                 },
//                 success: function(response) {
//                    alert(response);
//                    $(".add_ajax").load(location.href + " .add_ajax");
//                 }
//             }); 
//        });                    
//    });
//        
//    $('div.pin a').mouseout(function(){
//        $(this).siblings('#delpin').hide();
//    }); 
//});
</script>
<form method="post" action="upload_01.php?mid=<?php echo $mid;?>" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
    <input type="file" name="myfile" size="50"/><br><br>
    <input type="submit" value="上傳">
</form>
<?php
echo "<div id='wrapper'>";
  echo "<div id='columns'>";
    
    while( $data = $result->fetch_assoc() ){
        if( strlen($data['name'])>=26 ){
            $na= substr($data['name'], 0, 22). "...". 
                    substr($data['name'], strlen($data['name'])-4, 4);            
        }else{ 
            $na= $data['name'];
        }
        echo "<div class='pin'><div id='delpin' >X</div>";
        echo "<a href='".$path.$data['name']."'><img src='". $path.$data['name'] ."' width='300'/></a>";   
        echo "<p id='{$data['iId']}'>". $na ."</p>";
        echo "</div>";
    }
    
  echo "</div>";
echo "</div>";
?>