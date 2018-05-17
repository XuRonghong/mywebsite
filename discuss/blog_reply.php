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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO reply (bid, rcontent) VALUES (%s, %s)",
                       GetSQLValueString($_POST['bid'], "int"),
                       GetSQLValueString($_POST['rcontent'], "text"));

  mysql_select_db($database_connect_plu, $connect_plu);
  $Result1 = mysql_query($insertSQL, $connect_plu) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>無標題文件</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="Templates/fromWeb/style.css"/>
</head>

<body>
<table width="100%" border="0px" cellpadding="0px" cellspacing="0px" >	
  <tr>
    	<td align="center">
        	
            <table width="960px" border="0px" cellpadding="0px" cellspacing="0px" >
                <tr>
                    <td>
                        <img src="images/banner01-3.jpg" />
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        <table width="100%" border="0px" cellpadding="0px" cellspacing="0px">
                        	<tr>
                                <td width="150px" valign="top">
                                    
                                    
                                    <table width="100%" border="0px" cellpadding="0px" cellspacing="0px" >
                                        <tr>
                                            <td><a href="index.php"><img src="images/button3-1.jpg" /></a></td>
                                        </tr>
                                         <tr>
                                            <td>
                                                <img src="images/button3-2.jpg" />
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                                <img src="images/button3-3.jpg" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="images/button3-4.jpg" />
                                            </td>
                                        </tr> 
                                         
                                    </table>
                                    
                                    
                              </td>
                                <td valign="top" align="left">
                                    
                                    
                                    <table width="100%" border="0px" cellpadding="0px" cellspacing="0px" >
                                    	<tr>
                                        	<td><!-- InstanceBeginEditable name="EditRegion" -->
                                            <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                                              <table align="center">
                                                <tr valign="baseline">
                                                  <td align="right" valign="top" nowrap="nowrap">回覆內容:</td>
                                                  <td><textarea name="rcontent" cols="60" rows="10"></textarea></td>
                                                </tr>
                                                <tr valign="baseline">
                                                  <td nowrap="nowrap" align="right">&nbsp;</td>
                                                  <td><input type="submit" value="回覆" /></td>
                                                </tr>
                                              </table>
                                              <input type="hidden" name="bid" value="<?php echo $_GET['bid'];?>" />
                                              <input type="hidden" name="MM_insert" value="form1" />
                                            </form>
                                            <p>&nbsp;</p>
                                        	<!-- InstanceEndEditable --></td>
                                        </tr>
                                    </table>
                                    
                                    
                              </td>
                            </tr>
                        </table>
                        
                        
                    </td>
                </tr>
                <tr>
                    <td style="border-top:#999 solid 1px; padding-top: 10px; color:#666">
                        Copyright @ Product Life Unit&nbsp;&nbsp; TEL: 0960-XXX-XXX 
                    </td>
                </tr>
            </table>
            
        </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
