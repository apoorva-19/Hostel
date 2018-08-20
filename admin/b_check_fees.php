<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../403.html");
        exit;
    }
    if($_SESSION["user"] != "admin")
    {
        header("Location:../403.html");
        exit;
    }
    require_once("../connect.php");
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["amt"]) && isset($_POST["misID"]) && isset($_POST["receipt_no"]) && isset($_POST["verify_mis_id"]))
    {
        $jsonArray = array();
        $mis = test_input($_POST["misID"]);
        $verify_mis_id = test_input($_POST["verify_mis_id"]);
        $receipt_no = test_input($_POST["receipt_no"]);
        $fees_paid = "SELECT Receipt_No, Amount_Paid FROM `New_Registrations` WHERE `MIS`=?";
        if(!($fees_paid = $mysqli->prepare($fees_paid)))
        {
            //error_log('Prepare failed for retrieving receipt number and amount paid in check_fees.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($fees_paid->bind_param('s', $mis)))
        {
            //error_log('Bind param failed for retrieving receipt number and amount paid in check_fees.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($fees_paid->execute()))
        {
            //error_log('Execution failed for retrieving receipt number and amount paid in check_fees.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if($result = $fees_paid->get_result())
        {
            $row = $result->fetch_assoc();            
            if($_POST["amt"] == $row["Amount_Paid"] && $receipt_no == $row["Receipt_No"] && $verify_mis_id == $mis)
            {
                $jsonArray["result"] = "MIS Id, Receipt Number and Amount Paid have been verified. Room can now be allocated.";
                //error_log("here");
                $warden_verification = "UPDATE `New_Registrations` SET `Verify_Warden` = 'Y' WHERE `MIS` = ?";
                if(!($warden_verification = $mysqli->prepare($warden_verification)))
                {
                    //error_log('Prepare failed for warden_verification in check_fees.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    exit;
                }
                if(!($warden_verification->bind_param('s', $mis)))
                {
                    //error_log('Bind param failed for warden_verification in check_fees.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    exit;
                }
                if(!($warden_verification->execute()))
                {
                    //error_log('Execution failed for warden_verification in check_fees.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    exit;
                }
                if(!($result = $warden_verification->get_result()) && $mysqli->errno != 0)
                {
                    //error_log('Get result failed for warden_verification in check_fees.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "MIS Id, Receipt Number and Amount Paid have not been verified.";
                }
            }
            else
            {
                $jsonArray["result"] = "MIS Id, Receipt Number and Amount Paid have not been verified.";
            }
        }
        else
        {
            $jsonArray["result"] = "MIS Id, Receipt Number and Amount Paid have not been verified.";
        }
        echo json_encode($jsonArray);
    }
?>
