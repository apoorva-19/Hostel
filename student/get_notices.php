<?php

	require_once("../connect.php");

	$sql = "SELECT Category, Date_From, Date_To, Notice_Text FROM Notices";
	$result = $mysqli->query($sql);
	$jsonArray = array();
	
	while($row = $result->fetch_assoc())
    {
        array_push($jsonArray, $row);
    }

    $json = json_encode($jsonArray);

    echo $json;

?>