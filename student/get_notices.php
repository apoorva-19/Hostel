<?php
    session_start();
    if(empty(trim($_SESSION["user"])))
    {
        header("Location:../404.html");
        exit;
    }
    if(empty(trim($_SESSION["gender"])))
    {
        header("Location:../404.html");
        exit;
    }
    if($_SESSION["user"] != $_COOKIE["user"])
    {
        header("Location:../404.html");
        exit;
    }
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