<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_discu = "localhost";
$database_discu = "plu";
$username_discu = "root";
$password_discu = "123456";
$discu = mysql_pconnect($hostname_discu, $username_discu, $password_discu) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names utf8");
?>