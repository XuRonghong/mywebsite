<?php
if(!isset($_SESSION))
	session_start();

$_SESSION['us'] = null;
$_SESSION['mid'] = null;

//session_destroy();

	setcookie("Us", "", time()-3600);
	setcookie("Mid", "", time()-3600);

header("location: index.php");
?>
