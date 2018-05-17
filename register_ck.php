<?php
     $us = $_POST['us'];
     $pw = $_POST['pw'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $birthday = $_POST['birthday'];
     $sex = $_POST['sex'];
     $phone = $_POST['phone'];
    
    include_once 'conn/db_config.php';
    
    $sql = "select * from member ";
    $result = $mysqli->query($sql) or die("註冊 抓取資料錯誤");
    
    while($row = $result->fetch_assoc()){
        if($row['id']==$us)die ('帳號已存在');
    }
    
    $sql = "insert `member`(id,pw,name,email,sex,birthday,mPhone) 
            values('". $us ."',
                  '". $pw ."',
                  '". $name ."',
                  '". $email ."',
                  '". $birthday ."',
                  '". $sex ."',
                  '". $phone ."') ";
    $result = $mysqli->query($sql) or die("註冊 新增資料錯誤");
   // echo $row['us'].'-'.$row['pw'].$row['name'].$row['email'].$row['birthday'];
//    header("Location: index.php");
?>