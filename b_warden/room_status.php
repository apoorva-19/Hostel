<?php

    require_once("../connect.php");

    $sql = "SELECT Room_No, Reserved FROM B_Room";

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