<?php
    session_start();
    require_once('connect.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $jsonResponse = array();
        if(empty($_POST["email"]) || !filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL))
        {
            $jsonResponse["status"] = "failure";
            $jsonResponse["message"] = "Please enter a valid email id";
        }
        if(empty($_POST["password"]))
        {
            $jsonResponse["status"] = "failure";
            $jsonResponse["message"] = "Password cannot be empty";
        }
        else
        {
            $email = test_input($_POST["email"]);
            $password = $_POST["password"];
            $sql = "SELECT `MIS`, `Email_Id`, `Password` FROM `New_Registrations` WHERE `Email_Id` = ?";
            if(!$verify_user = $mysqli->prepare($sql))
            {
                $jsonResponse["status"] = "failure";
                $jsonResponse["message"] = "We could not process your request because of an error in the server. We are working tirelessly to fix the issue. Please try again later.";
            }
            else
            {
                if(!$verify_user->bind_param('s', $email))
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
                            $jsonResponse["message"] = "Incorrect email ID or password";
                        }
                        else
                        {
                            $row = $result->fetch_assoc();
                            if(password_verify($password, $row["Password"]))
                            {
                                $_SESSION["user"] = $row["MIS"];
                                $jsonResponse["status"] = "success";
                                $jsonResponse["message"] = "Login successful";
                                $jsonResponse["url"] = "/student/index.php";
                            }
                            else
                            {
                                $jsonResponse["status"] = "failure";
                                $jsonResponse["message"] = "Incorrect email ID or password";
                            }
                        }
                    }
                }
            }
        }
        echo json_encode($jsonResponse);
    }
?>