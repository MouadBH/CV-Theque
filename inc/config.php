<?php
//  Open Session
	ob_start();
	session_start();
//  DataBase Connection
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DBNAME', 'cv');
	
	$con = mysqli_connect(HOST,USER,PASS,DBNAME);
	if (mysqli_connect_errno()) {
		die("DB error ".mysqli_connect_errno());
	}
	require("func.php");
	
?>