<?php
//計算瀏覽人數之模組化練習


    if(!isset($_SESSION))
	    session_start();
        
        //require_once 'db_config.php';
        
	$sql = "select people from record where record.record_id=1";
	$result = $mysqli->query($sql) or ''; //mysqli_error($link);
	
	if( $result != '' ){
	    $row = $result->fetch_assoc();
	    //foreach( $result as $row){
		    $peo= $row['people'];
	    //}
	}else{
	    $peo=0;
	}
		
	if( !isset($_SESSION['count']) ){
		$peo++ ;
		$_SESSION['count']= 1;
		
    	$sql = "update record set record.people=".$peo." where record.record_id=1";
    	$mysqli->query($sql)  or '';//mysqli_error($link);
	}
        
       
?>