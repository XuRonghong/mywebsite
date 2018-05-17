<?php
$table_name = $_POST['tablename'];
$table_name = str_replace(" ","_nbsp-",$table_name);
$table_name = htmlspecialchars( $table_name );

//sleep(1); //為了製造 ajax loading效果，所以延遲1秒
//echo "You input name is $myname <br>";
if($table_name==NULL)die("群組名稱不能空");

include_once 'conn/db_config.php';


$sql = "select gName from website_group 
		where  enable>0  and gName='$table_name' 
					     and mId='". $_POST['mid'] ."'";
		
$result = $mysqli->query($sql) or die("抓取群組資料錯誤");
$row = $result->fetch_assoc();
while($row) {       
        if( $row['gName'] != $table_name ){
        }
        else{
            die("此群組名稱已存在囉");
        }
}

$sql = "insert into website_group(gName,mId) 
			value ('$table_name','" . $_POST['mid'] . "')";
$mysqli->query($sql) or die("新增群組資料錯誤");
die($_POST['tablename']);


/*if($row['gId']<0)
    $sql = "update website_group set gId=(gId*-1) where gName='$table_name'";
else*/


//echo "add group success";
?> 