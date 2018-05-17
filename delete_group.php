<?php

$web_group = $_POST['wgroup'];
$web_group = htmlspecialchars($web_group);

die( $web_group);

include_once 'conn/db_config.php';
/*
$website_name = $_POST['webname'];
$website = $_POST['website'];
$website_name = htmlspecialchars($website_name);
$website = htmlspecialchars($website);

sleep(1); //為了製造 ajax loading效果，所以延遲5秒
//echo "You input name is $myname <br>";

if($group_name==NULL)$group_name="其他";
if($website_name==NULL)die("網站名稱不能空");
if($website==NULL)die("網址不能空");
include_once '../db_config.php';

echo $website_name;

$sql = "select gId 
        from website_group 
        where gName='$group_name'";
$result = mysql_query($sql) or die("抓取ws資料錯誤");
$row = mysql_fetch_array($result);
if($row['gId']==0){*/

    $sql = "select gId from website_group 
			where  enable > 0  and gName='". $web_group ."' 
						       and mId='". $_POST['mid'] ."'";
    $result = $mysqli->query($sql) or die("抓取wg資料錯誤02");
    $row = $result->fetch_assoc();
	
    //$delgid = ($row['gId']>0)? -$row['gId'] : $row['gId'];*/
    $sql = "update website_group set enable=(enable*-1) 
			where  enable>0  and gName='". $web_group ."' 
						     and mId='". $_POST['mid'] ."'";
    $mysqli->query($sql) or die("更新wg資料錯誤02");   
	
    $sql = "update website set gId=(gId*-1) 
			where gId='". $row['gId'] ."' 
			  and mId='". $_POST['mid'] ."'";
    $mysqli->query($sql) or die("更新ws資料錯誤02");   
    /*
}
$gid = $row['gId'];
        
$sql = "insert into website(wName,wSite,gId) value ('$website_name','$website','$gid')";
mysql_query($sql) or die("新增ws資料錯誤");


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
