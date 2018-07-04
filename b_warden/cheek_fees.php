<?php
    require_once("../connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["amt"]) && isset($_POST["misID"]))
    {
        $jsonArray = array();
        $fees_paid = "SELECT Amount_Paid FROM `New_Registrations` WHERE `MIS` = '".$_POST["misID"]."';";
        // $result["result"] = $sql;
        // echo json_encode($result);
        // $stmt = $mysqli->prepare($sql);
        // $stmt->bind_param("ss", test_input($_POST["roomNo"]), test_input($_POST["misID"]));
        // $stmt->execute();
        // $stmt->close();
        if($result = mysqli_query($mysqli, $fees_paid))
        {
            $row = $result->fetch_assoc();
            if($_POST["amt"] == $row["Amount_Paid"])
            {
                $jsonArray["result"] = "Amount is correct!";
            }
            else
            {
                $jsonArray["result"] = "Amount is incorrect";
            }
        }
        else
        {
            $jsonArray["result"] = "Amount is incorrect";
        }
        echo json_encode($jsonArray);
    }
?>