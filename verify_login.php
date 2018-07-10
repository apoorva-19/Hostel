<?php
    session_start();
    require_once('../connect.php');
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["id_token"]))
    {
        $jsonArray = array();
        $email = $_POST["email"];
        $id_token = $_POST["id_token"];
        error_log($email);
        error_log($id_token);
        $sql = "SELECT * FROM `Hostelite` WHERE `Email_Id` = ?";
        if(!($sql = $mysqli->prepare($sql)))
        {
            error_log('Prepare failed for login verification in verify_login.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($sql->bind_param('s', $email)))
        {
            error_log('Bind param failed for login verification in verify_login.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($sql->execute()))
        {
            error_log('Execution failed for login verification in verify_login.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($res = $sql->get_results()))
        {
            error_log('Get results failed for login verification in verify_login.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Account does not exist. Please sign up first.";
            exit;
        }
        $row = $res->fetch_assoc();
        if(empty($row['OAuth_Token']))
        {
            $update = "UPDATE `Hostelite` SET `OAuth_Token` = ? WHERE `Email_Id` = ?";
            if(!($update = $mysqli->prepare($update)))
            {
                error_log('Prepare failed for updating details in verify_login.php: ('.$mysqli->errno.') '.$mysqli->error);
                $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                exit;
            }
            if(!($update->bind_param('ss', $id_token, $email)))
            {
                error_log('Bind param failed for login verification in verify_login.php: ('.$mysqli->errno.') '.$mysqli->error);
                $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                exit;
            }
            if(!($update->execute()))
            {
                error_log('Execution failed for login verification in verify_login.php: ('.$mysqli->errno.') '.$mysqli->error);
                $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                exit;
            }
            $jsonArray["result"] = "Sign in done.";
        }
        else if($row['OAuth_Token'] != $id_token)
        {
            error_log('OAuth Token failed to match for login verification room in verify_login.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Account does not exist. Please sign up first.";
            exit;
        }
        $_SESSION["user"] = $row["MIS"];
        $jsonArray["result"] = "Sign in done.";
        echo json_encode($jsonArray);
    }
?>