<?php
    require_once ("../connect.php");
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["allowed"]) && isset($_POST["misID"]))
    {
        $jsonArray = array();
        $mis = test_input($_POST["misID"]);
        $allowed = test_input($_POST["allowed"]);

        $consent = "UPDATE `G_Night_Permission` SET `W_Consent` = ? WHERE `MIS` = ?";
        if(!($consent = $mysqli ->prepare($consent)))
        {
            //error_log('Prepare failed for consent in night_consent.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;

        }
        if(!($consent->bind_param('ss',$allowed,$mis)))
        {
            //error_log('Bind param failed for consent in night_consent.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($consent->execute()))
        {
            //error_log('Execution failed for consent in night_consent.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!$result = $consent->get_result() && $mysqli->errno == 0)
        {
            $jsonArray["result"] = "Consent has been succesfully given";
        }
        else
        {
            $jsonArray["result"] = "Consent could not be given. Please try again";
        }
        echo json_encode($jsonArray);
    }
?>