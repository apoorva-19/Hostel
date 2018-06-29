<?php
$connect = new mysqli("localhost", "root", "", "hostel_mgmt");
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>