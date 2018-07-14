<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../404.html");
        exit;
    }
    if($_SESSION["user"] != "admin")
    {
        header("Location:../404.html");
        exit;
    }
    require_once("../connect.php");
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["roomNo"]) && isset($_POST["misID"]))
    {
        $jsonArray = array();
        $mis = test_input($_POST["misID"]);
        $room_no = test_input($_POST["roomNo"]);
        $verify = "SELECT `Verify_Warden` FROM `New_Registrations` WHERE `MIS` = ?";
        if(!($verify = $mysqli->prepare($verify)))
        {
            //error_log('Prepare failed for warden verification room in allocate_room.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            echo json_encode($jsonArray);
            exit;
        }
        if(!($verify->bind_param('s',$mis)))
        {
            //error_log('Bind param failed for warden verification room in allocate_room.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            echo json_encode($jsonArray);
            exit;
        }
        if(!($verify->execute()))
        {
            //error_log('Execution failed for warden verification room in allocate_room.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            echo json_encode($jsonArray);
            exit;
        }
        if($result = $verify->get_result())
        {
            $row = $result->fetch_assoc();
            if($row["Verify_Warden"] == 'Y')
            {
                $sql = "UPDATE New_Registrations SET Room_No = ? WHERE MIS = ?";
                if(!($sql = $mysqli->prepare($sql)))
                {
                    //error_log('Prepare failed for allocating room in allocate_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    echo json_encode($jsonArray);
                    exit;
                }
                if(!($sql->bind_param('ss',$room_no, $mis)))
                {
                    //error_log('Bind param failed for allocating room in allocate_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    echo json_encode($jsonArray);
                    exit;
                }
                if(!($sql->execute()))
                {
                    //error_log('Execution failed for allocating room in allocate_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    echo json_encode($jsonArray);
                    exit;
                }
                if(!$result = $sql->get_result() && $mysqli->errno == 0)
                {
                    $sql = "UPDATE B_Room SET Reserved = 'Y' WHERE Room_No = ?";
                    if(!($sql = $mysqli->prepare($sql)))
                    {
                        //error_log('Prepare failed for updating room in allocate_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                        echo json_encode($jsonArray);
                        exit;
                    }
                    if(!($sql->bind_param('s',$room_no)))
                    {
                        //error_log('Bind param failed for updating room in allocate_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                        echo json_encode($jsonArray);
                        exit;
                    }
                    if(!($sql->execute()))
                    {
                        //error_log('Execution failed for upating room in allocate_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                        echo json_encode($jsonArray);
                        exit;
                    }
                    if(!$result = $sql->get_result() && $mysqli->errno == 0)
                    {
                        $sql = "INSERT INTO `Hostelite`(`MIS`, `Email_Id`, `Password`, `Name`, `Gender`, `S_Contact`, `DOB`, `Reg_Date`, `Branch`, `Year`, `Room_No`, `Admission_Type`, `Receipt_No`, `Amount_Paid`, `Mode_Transaction`, `Street`, `City`, `State`, `Pincode`, `Country`) SELECT `MIS`, `Email_Id`, `Password`, `Name`, `Gender`, `Contact_Number`, `DOB`, `Reg_Date`, `Branch`, `Year`, `Room_No`, `Admission_Type`, `Receipt_No`, `Amount_Paid`, `Mode_Transaction`, `Street`, `City`, `State`, `Pincode`, `Country` FROM `New_Registrations` WHERE `New_Registrations`.`MIS` = ?";
                        if(!$transfer_user = $mysqli->prepare($sql))
                            $jsonArray["result"] = "An error has occured. Please contact the system administrator with MIS id of the student";
                        else
                        {
                            if(!$transfer_user->bind_param('s', $mis))
                                $jsonArray["result"] = "An error has occured. Please contact the system administrator with MIS id of the student";
                            else
                            {
                                if(!$transfer_user->execute())
                                    $jsonArray["result"] = "An error has occured. Please contact the system administrator with MIS id of the student";
                                else
                                {
                                    if(!$result = $transfer_user->get_result() && $mysqli->errno == 0)
                                    {
                                        $sql = "DELETE FROM `New_Registrations` WHERE `MIS` = ?;";
                                        if(!$delete_stud = $mysqli->prepare($sql))
                                            $jsonArray["result"] = "An error has occured. Please contact the system administrator with MIS id of the student";
                                        else
                                        {
                                            if(!$delete_stud->bind_param('s', $mis))
                                                $jsonArray["result"] = "An error has occured. Please contact the system administrator with MIS id of the student";
                                            else
                                            {
                                                if(!$delete_stud->execute())
                                                    $jsonArray["result"] = "An error has occured. Please contact the system administrator with MIS id of the student";
                                                else
                                                {
                                                    if(!$result = $delete_stud->get_result() && $mysqli->errno == 0)
                                                        $jsonArray["result"] = "Room has been alloted successfully!";
                                                    else
                                                        $jsonArray["result"] = "An error has occured. Please contact the system administrator with MIS id of the student";
                                                }
                                            }
                                        }
                                    }
                                    else
                                        $jsonArray["result"] = "An error has occured. Please contact the system administrator with MIS id of the student";
                                }
                            }
                        }
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
            }
            else
            {
                $jsonArray["result"] = "Details not verified. Please verify and try again.";
            }
        }
        else
        {
            $jsonArray["result"] = "Room could not be alloted. Please try again";
        }
        echo json_encode($jsonArray);
    }
?>