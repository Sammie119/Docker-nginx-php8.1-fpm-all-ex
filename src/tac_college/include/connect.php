<?php
	$host = "mysqldb";
	$user = "root";
	$password = "Sammie@119";
	$dbname = "tac_college";
	
	$conn = mysqli_connect($host,$user,$password, $dbname);
		if(!$conn){
			die ("Connection failed: ".mysqli_connect_error());
		}
	
?>