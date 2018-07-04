<?php
    require_once("../connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["amt"]) && isset($_POST["misID"]))
    {
        $jsonArray = array();
        $update = "UPDATE New_Registrations SET Amount_Paid = ".$_POST['amt']." WHERE MIS = '".$_POST['misID']."'";
        // $result["result"] = $sql;
        // echo json_encode($result);
        // $stmt = $mysqli->prepare($sql);
        // $stmt->bind_param("ss", test_input($_POST["roomNo"]), test_input($_POST["misID"]));
        // $stmt->execute();
        // $stmt->close();
        if($result = mysqli_query($mysqli, $update))
        {
            $jsonArray["result"] = "Fees paid updated";
        }
        else
        {
            $jsonArray["result"] = "Updation failed";
        }
        echo json_encode($jsonArray);
    }
?>