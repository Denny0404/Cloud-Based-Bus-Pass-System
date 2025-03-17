<?php
global $conMysqli_ehsAw12;
function mysql_connect($host,$user,$pwd){
	$conMysqli_ehsAw12 =  ($GLOBALS["___mysqli_ston"] = mysqli_connect($host,$user,$pwd));
	return $conMysqli_ehsAw12;
}
function mysql_select_db($dbname,$conMysqli_ehsAw12){
	mysqli_select_db($GLOBALS["___mysqli_ston"], $dbname);
}
function mysql_query($qry){
	return mysqli_query($GLOBALS["___mysqli_ston"], $qry);
}
function mysql_insert_id(){
	return mysqli_insert_id($GLOBALS["___mysqli_ston"]);
}
function mysql_real_escape_string($str){
	return mysqli_real_escape_string($GLOBALS["___mysqli_ston"],$str);
}
function mysql_num_rows($result){
	return mysqli_num_rows($result);
}
function mysql_fetch_array($result){
	return mysqli_fetch_array($result);
}
function mysql_fetch_assoc($result){
	return mysqli_fetch_array($result, MYSQLI_ASSOC);
}
function mysql_error(){
	return mysqli_error($GLOBALS["___mysqli_ston"]);
}
?>