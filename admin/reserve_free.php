<?php
    require_once('../connect.php');

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hostel"]) && isset($_POST["action"]) && isset($_POST["category"]))
    {
        $jsonArray = array();
        $hostel = $_POST["hostel"];
        if($hostel == 1)
            $table_name = "G_Room";
        else
            $table_name = "B_Room";
        $action = $_POST["action"];
        $category = $_POST["category"];
        if($action == 1)
            $reserved = 'Y';
        else
            $reserved = 'N';
        $sql = "UPDATE ".$table_name." SET `Reserved` = ? WHERE `Type` = ?;";
        if(!($sql = $mysqli->prepare($sql)))
        {
            //error_log('Prepare failed for update statement in reserve_free.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($sql->bind_param('ss', $reserved, $category)))
        {
            //error_log('Bind param failed for update statement in reserve_free.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($sql->execute()))
        {
            //error_log('Execution failed for update statement in reserve_free.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if($action == 1)
            $jsonArray["result"] = "Rooms have been reserved successfully!";
        else
            $jsonArray["result"] = "Rooms have been freed successfully!";
    }
    echo json_encode($jsonArray);
?>