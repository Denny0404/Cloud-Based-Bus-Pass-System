<?php  
session_start();
// include("mysqli-plugin.php");
// error_reporting(~E_NOTICE || ~E_WARNING || ~E_ERROR);
	$servername = "localhost";  
	$username = "root";  
	$password = "123456";  
	$db = "travel";  
	global $con;
	$con = mysqli_connect ($servername , $username , $password, $db) or die("unable to connect to host or database");  
?>