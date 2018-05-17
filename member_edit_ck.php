<?php
     $us = $_POST['us'];
//     $prePw = $_POST['prePw'];
     $pw = $_POST['pw'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $birthday = $_POST['birthday'];
     $sex = $_POST['sex'];
     $phone = $_POST['phone'];
    
    include_once 'conn/db_config.php';
    
    $sql = "update member set pw='".$pw."',
                              name='".$name."',
                              email='".$email."',
                              sex='".$sex."',
                              birthday='".$birthday."',
                              mPhone='".$phone."'  
            where id='".$us."'";
    $result = $mysqli_query($sql) or die("此帳號修改錯誤");
    
    
?>