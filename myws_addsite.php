<?php
$group_name = $_POST['guname'];
$group_name = str_replace(" ","_nbsp-",$group_name);
$group_name = htmlspecialchars($group_name);

$website_name = $_POST['webname'];
$website_name = str_replace(" ","_nbsp-",$website_name);
$website_name = htmlspecialchars($website_name);


$website = str_replace("_and-", "&", $_POST['website']);
//$website = htmlspecialchars($website);

$mid=$_POST['mid'];


sleep(0.5); //為了製造 ajax loading效果，所以延遲0.5秒
//echo "You input name is $myname <br>";

if($group_name==NULL)$group_name="其他";
if($website_name==NULL)die("網站名稱不能空");
if($website==NULL)die("網址不能空");

include_once 'conn/db_config.php';

echo $_POST['webname'];

$sql = "select *
        from website 
        where gId>0 and wName='$website_name' 
					and mId='". $mid ."'";
$result = $mysqli->query($sql) or die("抓取ws資料錯誤01");
if( $row = $result->fetch_assoc() )die("網站名稱重複");



$sql = "select gId 
        from website_group 
        where enable>0 and gName='$group_name' 
					and mId='". $mid ."'";
$result2 = $mysqli->query($sql) or die("抓取wg資料錯誤");

$row2 = $result2->fetch_assoc();
if($row2['gId']<=0){
    $sql = "insert into website_group(gName,mId) 
			value ('$group_name', '". $mid ."')";			
    $mysqli->query($sql) or die("新增wg資料錯誤01");
	   
    $sql = "select gId from website_group  where  enable>0 and gName='$group_name' 
					and mId='". $mid ."'";
					
    $result3 = $mysqli->query($sql) or die("抓取ws資料錯誤01");
    $row3 = $result3->fetch_assoc();
}
$gid = ( isset($row3['gId']) )? $row3['gId'] : $row2['gId'];   


$sql = "insert into website(wName,wSite,gId,mid) 
		value ( '".$website_name."',
                '".$website."',
                '".$gid."',
                '".$mid."')";
$mysqli->query($sql) or die("新增ws資料錯誤(可能有資料重複了)");


/*
$addwebsite = $_POST['website'];
echo $addwebsite;
*/

//$sql = "insert  website(wName) value ('$addwebsite') ";
//mysql_query($sql) or die("新增ws資料錯誤");

//header("location: index.php");
/*
while($row = mysql_fetch_array($result)){
    echo "<div id='$i++' border='1' width='100px' float='left'>";
    echo "*".$row['gName']."<br/>";
    echo "<hr><br/>";
    $sql = "select * 
        from website join website_group on gId=gId 
        group by wId asc";
    $result2 = mysql_query($sql) or die("網址資料錯誤");
    while($row2 = mysql_fetch_array($result2)){
        echo "<a href=". $row2['wSite'] .">".$row2['wName']."</a><br/>";
    }
    
    echo "</div>";
}
*/
?>
