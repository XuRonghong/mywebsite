<?php require_once('Connections/discu.php'); ?>
<?php header('refresh: 60;url=discuss.php?mid='.$_GET['mid']) ?>
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 15;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_discu, $discu);
$query_Recordset1 = "SELECT * FROM blog JOIN member ON blog.uid=member.mId ORDER BY btime DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $discu) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);

mysql_select_db($database_discu, $discu);
/*$query_Recordset2 = "SELECT * FROM reply JOIN member ON reply.uId=member.mId 
					 where reply.bid=".$row_Recordset1['bid'] ;
$Recordset2 = mysql_query($query_Recordset2, $discu) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2)*/;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/discuss.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>ideaShare</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="style.css"/>
<script src="../SpryAssets/SpryEffects.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_effectAppearFade(targetElement, duration, from, to, toggle)
{
	Spry.Effect.DoFade(targetElement, {duration: duration, from: from, to: to, toggle: toggle});
}
</script>
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
                                <td width="160" valign="top">
                                    
                                    
                                    <table width="100%" border="0px" cellpadding="0px" cellspacing="0px" >
                                        <tr>
                                            <td class="left">
                                            	<a href="../index.php"><h3>首 頁</h3></a><hr />
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="left">
                                                <a href="blog_add.php"><h3>新 主 題</h3></a><hr />
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="left">
                                            	<a href=""><h3>新 點 子</h3></a><hr />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                            	<a href=""><h3>留 言 板</h3></a><hr />
                                            </td>
                                        </tr> 
                                         
                                    </table>
                                    
                                    
                              </td>
                                <td valign="top" align="left"><!-- InstanceBeginEditable name="EditRegion3" -->
                                <table width="100%" border="0px" cellpadding="0px" cellspacing="0px" >
                                  <tr>
                                    <td>
                                    <div class="blog" id="input">
                                        共有 <?php echo ($startRow_Recordset1 + 1) ?>/<?php echo $totalRows_Recordset1 ?> 篇主題文章
                                        <br />
                                        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">第一頁</a>
                                    | <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">上一頁</a> | <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">下一頁</a> | <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">最後一頁</a></div>
                                    
<?php do { ?>
                                      <div class="blog" id="<?php echo 'bid'.$row_Recordset1['bid'];?>">
                                        <div id='host'> <?php echo $row_Recordset1['name']; ?> </div>
                                        <div id='cont'><?php echo nl2br( str_replace (' ', '&nbsp;', $row_Recordset1['bcontent']) ); ?>
                                        <br /><h5 align="right"><?php echo $row_Recordset1['btime']; ?></h5>
                                            <div id='mess'>
                                            <hr />
                                           	  <table id='messag'>
                                            	<?php 											
$query_Recordset2 = "SELECT * FROM reply JOIN member ON reply.uId=member.mId 
					 where reply.bid=".$row_Recordset1['bid'] ;
$Recordset2 = mysql_query($query_Recordset2, $discu) or die(mysql_error());
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
												while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)){ ?>
									
                                                <tr>
                                                <td ><div id='host'> <?php echo $row_Recordset2['name']; ?> </div>
                                            	<div id='cont'><?php echo nl2br( str_replace (' ', '&nbsp;', $row_Recordset2['rcontent']) ); ?>
                                                <div id='time' align="right"><?php echo $row_Recordset2['rtime']; ?></div>
                                                
                                                </td ></tr><tr><td id='hr'></td></tr>
                                                <?php } ; ?> <tr><td><div id='host'><?php 		
if(isset($_GET['mid'])){																					
	$query_Recordset3 = "SELECT * FROM member where member.mId=".$_GET['mid'] ;
	$Recordset3 = mysql_query($query_Recordset3, $discu) or die(mysql_error());
	$row_Recordset3 = mysql_fetch_assoc($Recordset3);
	
	echo $row_Recordset3['name'];
}else{
	echo "匿名者";
}
?></div><div id='cont' >
                                          <form action="mess_add.php?mid=<?php if(isset($_GET['mid'])){	echo $_GET['mid'];
}else{ echo "0"; }?>" method="post" name="form2" >
                                          		<textarea id="mymess" name='rcontent' placeholder="我想說" rows="5" cols="32"></textarea>
                                                <input type="submit" id='btnsub' value="submit"/>
                                                <input type="hidden" name='bid' value="<?php echo $row_Recordset1['bid'];?>" />
                                                <input type="hidden" name='mid' value="<?php if(isset($_GET['mid'])){	echo $_GET['mid'];
}else{ echo "0"; }?>"/>													
                                                </form></div>
                                              </td></tr></table>
                                            </div>   
                                        </div><br />
                                        <div id='empty'><hr /></div>
                                      </div>
                                      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                    </td>
                                  </tr>
                                </table>
                                <!-- InstanceEndEditable --></td>
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
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
