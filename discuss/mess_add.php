<?php require_once('Connections/connect_plu.php'); ?>
<?php
	
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

	$insertSQL = sprintf("INSERT INTO reply(bid, rcontent, uId) VALUES (%d, %s, %d)",
                       GetSQLValueString($_POST['bid'], "int"),
                       GetSQLValueString($_POST['rcontent'], "text"),
					   GetSQLValueString($_POST['mid'], "int"));
					   

	  mysql_select_db($database_connect_plu, $connect_plu);
	  $Result1 = mysql_query($insertSQL, $connect_plu) or die(mysql_error());
	  
	  //header('location: discuss.php');
if(isset($_GET['mid'])){	
	//echo "<script type='text/Javascript'>setTimeout(history.back(),1000);</script>";
	header('location: discuss.php?mid='. $_GET['mid']."#bid".$_POST['bid']); 
}else{	
	//echo "<script type='text/Javascript'>setTimeout(history.back(),1000);</script>";
	header('location: discuss.php?mid=0'."#bid".$_POST['bid']); 
}
?>