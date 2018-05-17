<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connect_plu = "localhost";
$database_connect_plu = "plu";
$username_connect_plu = "root";
$password_connect_plu = "123456";
$hostname_connect_plu2 = "sql210.byetcluster.com";
$database_connect_plu2 = "space_12472168_plu";
$username_connect_plu2 = "space_12472168";
$password_connect_plu2 = "eivk88e3";

$connect_plu = mysql_pconnect($hostname_connect_plu, $username_connect_plu, $password_connect_plu) 
or mysql_pconnect($hostname_connect_plu2, $username_connect_plu2, $password_connect_plu2) 
or trigger_error(mysql_error(),E_USER_ERROR); 


mysql_query("SET NAMES 'utf8'");
?>