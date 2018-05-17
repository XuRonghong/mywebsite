<?php
if(!isset($_SESSION))
	session_start();
	

ob_start();

/*if( !isset($_SESSION['pw']) ){
	header("location: index.php");
}*/

/*if( $_SESSION['pw']!=true || $_SESSION['us']==null){
    header("location: index.php");
}*/

include_once("conn/db_config.php");


 $us = $_POST['us'];
 $pw = $_POST['pw'];


if (PHP_VERSION < 6) {
    $us = get_magic_quotes_gpc() ? stripslashes($us) : $us;
    $pw = get_magic_quotes_gpc() ? stripslashes($pw) : $pw;
}
/*$us = function_exists("mysql_real_escape_string") ? 
        mysql_real_escape_string($us) : mysql_escape_string($us);
$pw = function_exists("mysql_real_escape_string") ? 
        mysql_real_escape_string($pw) : mysql_escape_string($pw);*/


echo $us ;
echo $pw ;

$sql = "select * from `member` ";
$result = $mysqli->query($sql) or die("抓取會員資料錯誤");

while ($data = $result->fetch_assoc()) {
    	if($data["id"]==$us && $data["pw"]==$pw){
    		$_SESSION["mid"] = $data["mId"];
    		$_SESSION['us'] = $us;
    		
    		setcookie('Mid', $data['mId'], time()+3600);
    		setcookie('Us', $us, time()+3600);
    				
    		//導向到會員用戶登入後使用畫面
        	header("location: myws_index.php?mid=".$_SESSION['mid'] );
    		die("login ... ");			//防止程式繼續往下執行
    	}
    
}
header("location: index.php?log=err");		//若沒成功登入進去，重新導向到登入畫面



/*if( $us!="rh" || $pw!="12472168" ){
    die("帳密錯誤");
    session_destroy();   
    header("location: index.php");
}else{
    $_SESSION['us'] = $us;
    $_SESSION['pw'] = true;

    header("location: myws_index.php");
}*/

?>
