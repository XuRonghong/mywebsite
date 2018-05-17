<?php

$web_site = $_POST['wsite'];
$web_site = htmlspecialchars($web_site);

echo $web_site;

include_once 'conn/db_config.php';

    $sql = "update website set gId=(gId*-1) 
			where  gId>0  and wName='$web_site' 
						  and mId='". $_POST['mid'] ."'";
    $mysqli->query($sql) or die("更新ws資料錯誤02");   
?>