<?php
    session_start();
    require_once('connect.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $jsonResponse = array();
        if(empty(trim($_POST["password"])))
        {
            $jsonResponse["status"] = "Failure";
            $jsonResponse["message"] = "Password cannot be empty";
        }
        else if(!preg_match('/^[ICE]{1}2K[0-9]{8}$/', strtoupper(trim($_POST["mis"]))))
        {
            $jsonResponse["status"] = "Failure";
            $jsonResponse["message"] = "Please enter a valid MIS Id";
        }
        else
        {
            $mis = strtoupper(test_input($_POST["mis"]));
            $password = $_POST["password"];
            $sql = "SELECT `Password`, `Gender` FROM `Hostelite` WHERE `MIS` = ?";
            if(!$verify_user = $mysqli->prepare($sql))
            {
                $jsonResponse["status"] = "Failure";
                $jsonResponse["message"] = "We could not process your request because of an error in the server. We are working tirelessly to fix the issue. Please try again later.";
            }
            else
            {
                if(!$verify_user->bind_param('s', $mis))
                {
                    $jsonResponse["status"] = "Failure";
                    $jsonResponse["message"] = "We could not process your request because of an error in the server. We are working tirelessly to fix the issue. Please try again later.";
                }
                else
                {
                    if(!$verify_user->execute())
                    {
                        $jsonResponse["status"] = "Failure";
                        $jsonResponse["message"] = "We could not process your request because of an error in the server. We are working tirelessly to fix the issue. Please try again later.";
                    }
                    else
                    {
                        $result = $verify_user->get_result();
                        if($result->num_rows == 0)
                        {
                            $sql = "SELECT COUNT(*) AS `Registered` FROM `New_Registrations` WHERE MIS = ?";
                            if(!$unverified_user = $mysqli->prepare($sql))
                            {
                                $jsonResponse["status"] = "Failure";
                                $jsonResponse["message"] = "We could not process your request because of an error in the server. We are working tirelessly to fix the issue. Please try again later.";
                            }
                            else
                            {
                                if(!$unverified_user->bind_param('s', $mis))
                                {
                                    $jsonResponse["status"] = "Failure";
                                    $jsonResponse["message"] = "We could not process your request because of an error in the server. We are working tirelessly to fix the issue. Please try again later.";
                                }
                                else
                                {
                                    if(!$unverified_user->execute())
                                    {
                                        $jsonResponse["status"] = "Failure";
                                        $jsonResponse["message"] = "We could not process your request because of an error in the server. We are working tirelessly to fix the issue. Please try again later.";
                                    }
                                    else
                                    {
                                        $result = $unverified_user->get_result();
                                        $row = $result->fetch_assoc();
                                        if($row["Registered"] == 1)
                                        {
                                            $jsonResponse["status"] = "Failure";
                                            $jsonResponse["message"] = "Your account has not been verified. Please contact the warden and verify your account.";
                                        }
                                        else
                                        {
                                            $jsonResponse["status"] = "Failure";
                                            $jsonResponse["message"] = "MIS id not found. Please sign up before logging in.";
                                        }
                                    }
                                }
                            }
                        }
                        else
                        {
                            $row = $result->fetch_assoc();
                            if(password_verify($password, $row["Password"]))
                            {
                                $_SESSION["user"] = $mis;
                                $_SESSION["gender"] = $row["Gender"];
                                setcookie("user", $mis, time() + 86400);
                                $jsonResponse["status"] = "success";
                                $jsonResponse["message"] = "Login successful";
                                $jsonResponse["url"] = "student/index.php";
                            }
                            else
                            {
                                $jsonResponse["status"] = "Failure";
                                $jsonResponse["message"] = "Incorrect mis ID or password";
                            }
                        }
                    }
                }
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