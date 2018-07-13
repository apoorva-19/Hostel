<?php
    session_start();
    require_once('connect.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $jsonResponse = array();
        if(empty($_POST["mis"]) && preg_match('/^[ICE]{1}2K[0-9]{8}/', strtoupper($_POST[mis])))
        {
            $jsonResponse["status"] = "failure";
            $jsonResponse["message"] = "Please enter a valid mis id";
        }
        if(empty($_POST["password"]))
        {
            $jsonResponse["status"] = "failure";
            $jsonResponse["message"] = "Password cannot be empty";
        }
        else
        {
            $mis = strtoupper(test_input($_POST["mis"]));
            $password = $_POST["password"];
            $sql = "SELECT `Password` FROM `New_Registrations` WHERE `MIS` = ?";
            if(!$verify_user = $mysqli->prepare($sql))
            {
                $jsonResponse["status"] = "failure";
                $jsonResponse["message"] = "We could not process your request because of an error in the server. We are working tirelessly to fix the issue. Please try again later.";
            }
            else
            {
                if(!$verify_user->bind_param('s', $mis))
                {
                    $jsonResponse["status"] = "failure";
                    $jsonResponse["message"] = "We could not process your request because of an error in the server. We are working tirelessly to fix the issue. Please try again later.";
                }
                else
                {
                    if(!$verify_user->execute())
                    {
                        $jsonResponse["status"] = "failure";
                        $jsonResponse["message"] = "We could not process your request because of an error in the server. We are working tirelessly to fix the issue. Please try again later.";
                    }
                    else
                    {
                        $result = $verify_user->get_result();
                        if($result->num_rows == 0)
                        {
                            $jsonResponse["status"] = "failure";
                            $jsonResponse["message"] = "mis Id does not exist";
                        }
                        else
                        {
                            $row = $result->fetch_assoc();
                            if(password_verify($password, $row["Password"]))
                            {
                                $_SESSION["user"] = $mis;
                                $jsonResponse["status"] = "success";
                                $jsonResponse["message"] = "Login successful";
                                $jsonResponse["url"] = "student/index.php";
                            }
                            else
                            {
                                $jsonResponse["status"] = "failure";
                                $jsonResponse["message"] = "Incorrect mis ID or password";
                            }
                        }
                    }
                }
            }
        }
        echo json_encode($jsonResponse);
    }
?>