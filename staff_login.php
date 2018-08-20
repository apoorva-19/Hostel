<?php
    session_start();
    require_once('connect.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $jsonResponse = array();
        if(empty($_POST["username"]))
        {
            $jsonResponse["status"] = "Failure";
            $jsonResponse["message"] = "Username field cannot be empty";
        }
        else if(empty($_POST["password"]))
        {
            $jsonResponse["status"] = "Failure";
            $jsonResponse["message"] = "Password field cannot be empty";
        }
        else
        {
            $username = test_input($_POST["username"]);
            $password = test_input($_POST["password"]);

            if($username == "admin" && $password == "apictotel@3006%")
            {
                $_SESSION["user"] = "admin";
                $jsonResponse["status"] = "success";
                $jsonResponse["message"] = "Login successful";
                $jsonResponse["url"] = "admin/index.php";
            }
            else if($username == "g_warden" && $password == "gpictotel@3006#")
            {
                $_SESSION["user"] = "g_warden";
                $jsonResponse["status"] = "success";
                $jsonResponse["message"] = "Login successful";
                $jsonResponse["url"] = "g_warden/index.php";
            }
            else if($username == "b_warden" && $password == "bpictotel@3006$")
            {
                $_SESSION["user"] = "b_warden";
                $jsonResponse["status"] = "success";
                $jsonResponse["message"] = "Login successful";
                $jsonResponse["url"] = "b_warden/index.php";
            }
            else
            {
                $jsonResponse["status"] = "Failure";
                $jsonResponse["message"] = "Invalid username or password";
            }
        }
        echo json_encode($jsonResponse);
    }
    else
    {
        header("Location: 403.html");
        exit;
    }
?>