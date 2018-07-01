<?php
    require_once("../connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["roomNo"]) && isset($_POST["misID"]))
    {
        $jsonArray = array();
        $sql = "UPDATE New_Registrations SET Room_No = '".test_input($_POST['roomNo'])."' WHERE MIS = '".test_input($_POST['misID'])."';";
        // $result["result"] = $sql;
        // echo json_encode($result);
        // $stmt = $mysqli->prepare($sql);
        // $stmt->bind_param("ss", test_input($_POST["roomNo"]), test_input($_POST["misID"]));
        // $stmt->execute();
        // $stmt->close();
        if($result = mysqli_query($mysqli, $sql))
        {
            $sql = "UPDATE B_Room SET Reserved = 'Y' WHERE Room_No = '".test_input($_POST['roomNo'])."';";
            if($result = mysqli_query($mysqli, $sql))
            {
                $jsonArray["result"] = "Room has been alloted successfully!";
            }
            else
            {
                $jsonArray["result"] = "Room could not be alloted. Please try again";
            }
        }
        else
        {
            $jsonArray["result"] = "Room could not be alloted. Please try again";
        }
        echo json_encode($jsonArray);
    }
?>