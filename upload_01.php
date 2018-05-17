<html>
  <head>
    <title>檔案上傳</title>
    <meta charset="utf-8">		
  </head>
  <body>
    <p align="center"><img src="title.jpg"></p>
    <?php
 $mid = $_GET['mid'];

// 建立 session
if (!isset($_SESSION)) {
  @session_start();
}
// 尚未登入
if ( !isset($_SESSION['mid']) || !isset($_COOKIE["Us"]) || $_GET['mid']!=$_SESSION['mid']) {
  header('Location: logout.php');
}
    
    require_once 'conn/db_config.php';
    
      //指定檔案儲存目錄及檔名
      //$upload_dir =  "../uploadFiles/";
		$screct = "1001".$mid.($mid*4);
		
      $upload_dir =  "upload/". md5($mid) ."/" ;
      if(!is_dir($upload_dir))mkdir ( "upload/". md5($mid) ."/" );       //若本身目錄不存在，建立目錄
      $upload_file = $upload_dir . $to = iconv("UTF-8", "big5", $_FILES["myfile"]["name"]);      
		
      //將上傳的檔案由暫存目錄移至指定之目錄
      if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_file))
      {
        echo "<strong>檔案上傳成功</strong><hr>";	
	
        
        $sql = "select count(*) from image 
                where name='".$_FILES["myfile"]["name"] ."' and mId='".$mid."'";
        $result=  $mysqli->query($sql);
        list($c) = $result->fetch_row();
        if($c == 0){
            $sql = "insert into image(name,size,mid) 
                    value('". $_FILES["myfile"]["name"]."','".$_FILES["myfile"]["size"]."','".$mid."') ";
            $mysqli->query($sql) or die("寫入資料庫錯誤");
        }
        
        
        //顯示檔案資訊		
        echo "檔案名稱：" . $_FILES["myfile"]["name"] . "<br>";	
        echo "暫存檔名：" . $_FILES["myfile"]["tmp_name"] . "<br>";
        echo "檔案大小：" . $_FILES["myfile"]["size"] . "<br>";
        echo "檔案種類：" . $_FILES["myfile"]["type"] . "<br>";						
        echo "<p><a href='JavaScript:history.back()'>back</a></p>";
      }
      else
      {
        echo "檔案上傳失敗 (" . $_FILES["myfile"]["error"] . ")<br><br>";
        echo "<a href='javascript:history.back()'>重新上傳</a>";
      }
    ?>
  </body>
</html>