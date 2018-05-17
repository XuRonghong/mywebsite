<?php

/* session_start();
    echo $_GET['id'];
    echo "++".$_COOKIE['mid'];
    //if(!empty( $_COOKIE['id'] ))header("Location: member_view.php");
    if( !isset($_SESSION['id']) )header("Location: ../member/member_index.php");
    
    
    $id = $_COOKIE['id'];
    $pw = $_COOKIE['pw'];
    $mid = $_GET['id'];
    if( !isset($mid) &&  $mid!=$_COOKIE['mid'] )header("Location: ../member/member_logout.php");
*/    
 $mid = $_GET['mid'];

// 建立 session
if (!isset($_SESSION)) {
  @session_start();
}
// 尚未登入
if ( !isset($_SESSION['mid']) || !isset($_COOKIE["Us"]) || $_GET['mid']!=$_SESSION['mid']) {
  header('Location: logout.php');
}

/*session_start();

if( !isset($_SESSION['pw']) || $_SESSION['us']==null || $_SESSION['pw']!=true){
    header("Location: index.php");
}
*/

include_once 'conn/db_config.php';

$sql = "select * from member where mId='".$mid."'";
$result = $mysqli->query($sql) ;//or die("(myws_index)資料錯誤");
$data = $result->fetch_assoc();

?>

<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <title>mywebsite</title>
    
    
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/myws_index.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    
	
	<script src="https://code.jquery.com/jquery-1.8.3.js"></script>
    
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <script type="text/javascript">
	
	//jQuery程式碼
	
$(document).ready(function () {
        $('loadingImg').hide();			//提示小圖示先隱藏，必要再顯示出
   $('#fragment-1').load('website.php');		//div區塊顯示另一個php網頁
   var $gp = $('.addarea').find('#group');
   
 $('#addgu').click(function (){
         $.ajax({						//本身做ajax技術傳輸，當按下 "新增群組" 觸發
         url: 'myws_addgu.php',
         cache: false,
         dataType: 'html',
             type:'POST',
         data:  "tablename="+$('#wgroup').val()+
				"&mid="+$('#mid').val(),
         error: function(xhr) {
           alert('Ajax request 發生錯誤');
         },
         success: function(response) {
                       
            $('#msg').html(response);
            $('#msg').fadeIn();
           
            $('#fragment-1').load('website.php');		//像是刷新 div區塊網頁
             
            $("#group").load(location.href + " #group");
            // $('.addarea').find('#group').html($gp);         
						
         }
     });     
     
  });

    $('#addsite').click(function(){
    
        /*由於網址不能傳送 '&' ，否則網頁會把它拆成get/post陣列
         *因此再傳送前先做編碼轉換，先將 '&' -> '_and-' 再送出
         *到接收端在解碼 
         */
            var path = $('#ws').val();
            var newPath = path.replace("&","_and-");  
            
    
         $.ajax({
            url: 'myws_addsite.php',
            cache: false,
            dataType: 'html',
                type:'POST',
            data: "website="+ newPath +
                  "&webname="+$('#wsn').val()+
                  "&guname="+$('#wgroup').val()+
				  "&mid="+$('#mid').val(),			//傳輸值，一併把會員資訊傳輸
          
            error: function(xhr) {
              alert('Ajax request 發生錯誤');
            },
            success: function(response) {
                      
			  $('#msg').html(response);
              $('#msg').fadeIn();              
              $('#fragment-1').load("website.php" );
            
			  $("#group").load(location.href + " #group");
              //$(".add_ajax").load(location.href + " .add_ajax");				
            }
        });
    });
  
 $('#clean').click(function(){
    //$('#msg').html("");
    // document.getElementById('msg').innerHTML = "";
 });
$("#loadingImg").ajaxStart(function(){
   $(this).show();
});
$("#loadingImg").ajaxStop(function(){
   $(this).hide();
   $('#loadingImg').html( "<img src='loading.gif'> loading..." );
});


});
</script>
</head>
<body >
    <div id="Div_left" >         
        <a href="index.php<?php if(isset($mid))echo "?mid=$mid";?>">回首頁</a>｜
        <a href="">談論</a>｜
        <a href="share.php?mid=<?php echo $mid;?>">我的分享</a>｜ 
        <a href="member_edit.php?mid=<?php echo $mid;?>">修改資料</a>｜   
        <a href="upload_index.php?mid=<?php echo $mid;?>">檔案列表</a>
        &nbsp;&nbsp;&nbsp;
                    
        <div id="Div_right" >
           <span> Hello, <?php echo $data['name'].' ';?>
           <?php if($data['sex']==2)echo '小姐'; else echo '先生';?> &nbsp;&nbsp;
           </span>
           
           <a href="logout.php">會員登出</a>
        </div>            
    </div>
        
        
<!--<br><br>
<div align="center">
Enter your name <br>
<input type="text" id="name"> <br>
<input type="button" value="send" >
<input type="button" value="reset" id="clean">
<br><br><br>

</div>-->
    
<div id="tabs">
    
    <div align="center" class="addarea">
        <form method="post" action="" >
            <div class="add_ajax">
                <label id="gulabel">
                    分群組：<input type="text" size="15" list="group" id="wgroup">
                </label>            
                <datalist id="group" >
                    <?php 
                    $sql = "select gName from website_group  
							where enable>0  and mId='". $mid ."' group by gId  desc";
                    $result = $mysqli->query($sql) or die("抓取群組資料錯誤");
                    while($row = $result->fetch_assoc())
                           echo "<option value=" . str_replace("_nbsp-","&nbsp;",$row['gName']) ."></option>";                
                    ?>                
                </datalist>
            
                <!--
                <input type="text" name="group" size="20">
                <select name="group">
                    <option>新聞</option>                
                </select>
                -->           
                <input type="button" id="addgu" name="addgu" value="新建群組">            
                </div><br>
            
            網站名稱<input type="text" name="website_name" size="15" id="wsn">
            網址<input type="text" name="website" size="35" id="ws">
            
            <input type="button" id="addsite" name="addsite" value="新增網址">
            
            <input type="hidden" id="mid" value="<?php echo $_GET['mid'];?>" >
            
        </form>
        
        <div id="msg" float="left" width="200px">-</div>
            <div id="loadingImg" style="display:none">
            <img src="loading.gif"> loading...
            </div>
        
    </div>
    
    <hr>
    
    <div id="fragment-1">
    </div>
    
</div>

</body>
</html>