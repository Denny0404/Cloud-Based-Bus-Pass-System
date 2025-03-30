<?php  
session_start();
// include("mysqli-plugin.php");
// error_reporting(~E_NOTICE || ~E_WARNING || ~E_ERROR);
	$servername = "127.0.0.1";  
	$username = "root";  
	$password = "root";  
	$db = "travel";  
	global $con;
	$con = mysqli_connect ($servername , $username , $password, $db) or die("unable to connect to host or database");  
?>