<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../403.html");
        exit;
    }
    if($_SESSION["user"] != "g_warden")
    {
        header("Location:../403.html");
        exit;
    }
    require_once("../connect.php");

    $sql = "SELECT Room_No, Reserved FROM G_Room";

    $result = $mysqli->query($sql);
    $jsonArray = array();

    //echo $result;

    while($row = $result->fetch_assoc())
    {
        array_push($jsonArray, $row);
    }

    $json = json_encode($jsonArray);

    echo $json;

?>