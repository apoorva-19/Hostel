<?php
/* 
	Before deploying on server go to the php.ini file and change the following:
		1. display_errors = Off
		2. log_errors = On
*/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try
{
	$mysqli = new mysqli("localhost", "root", "", "hostel_mgmt");
}
catch(Exception $e) {
	//error_log($e->getMessage());
	header("Location:500.html");
	exit;
}
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>