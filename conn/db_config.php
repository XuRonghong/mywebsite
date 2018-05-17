<?php
    $db= "localhost";
    $dbus= "id4956274_hellorh   ";
    $dbpw= "rke5oosj";
    $db2= "localhost";//"sql210.byetcluster.com"; //"sql210.000space.com";
    $dbus2= "id4956274_hellorh2";  //"space_12472168";
    $dbpw2= "rke5oosj";
    $dbname= "id4956274_mywebsite";
    $dbname2 = "space_12472168_mywebsite"; //"space_12472168_goldenbird";
             
    
    $link =  mysqli_connect($db2,$dbus2,$dbpw2) or mysqli_connect($db,$dbus,$dbpw);
    //mysql_select_db($dbname2) or mysql_select_db($dbname) or
     //mysqli_select_db("id4956274_mywebsite") or mysqli_select_db("space_12472168_mywebsite");
     
     $mysqli = new mysqli($db2,$dbus2,$dbpw2, $dbname);
     
    $mysqli->query("set names utf8");

?>
