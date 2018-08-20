<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../403.html");
        exit;
    }
    if($_SESSION["user"] != "g_warden")
    {
        header("Location:../403.html");
        exit;
    }
    require_once("../connect.php");
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["misID"]))
    {
        $jsonArray = array();
        $mis = test_input($_POST["misID"]);
        $fetch_mis = "SELECT * FROM `Hostelite` WHERE `MIS` = ? AND `Gender` = 'F';";
        if(!($fetch_mis = $mysqli->prepare($fetch_mis)))
        {
            //error_log('Prepare failed for unallocating room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        }
        else if(!($fetch_mis->bind_param('s', $mis)))
        {
            //error_log('Bind param failed for unallocating room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        }
        else if(!($fetch_mis->execute()))
        {
            //error_log('Execution failed for unallocating room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        }
        else if($result = $fetch_mis->get_result())
        {
            $row = $result->fetch_assoc();
            if($mis == $row["MIS"])
            {   
                $room = $row["Room_No"];
                $reset_room_no = "INSERT INTO `New_Registrations`(`MIS`, `Email_Id`, `Password`, `Name`, `Gender`, `Contact_Number`, `DOB`, `Reg_Date`, `Branch`, `Year`, `Admission_Type`, `Receipt_No`, `Amount_Paid`, `Mode_Transaction`, `Street`, `City`, `State`, `Pincode`, `Country`) SELECT `MIS`, `Email_Id`, `Password`, `Name`, `Gender`, `S_Contact`, `DOB`, `Reg_Date`, `Branch`, `Year`, `Admission_Type`, `Receipt_No`, `Amount_Paid`, `Mode_Transaction`, `Street`, `City`, `State`, `Pincode`, `Country` FROM `Hostelite` WHERE `Hostelite`.`MIS` = ?";
                if(!($reset_room_no = $mysqli->prepare($reset_room_no)))
                {
                    //error_log('Prepare failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                }
                else if(!($reset_room_no->bind_param('s', $mis)))
                {
                    //error_log('Bind param failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                }
                else if(!($reset_room_no->execute()))
                {
                    //error_log('Execution failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                }
                else
                {
                    $unallocate = "UPDATE `G_Room` SET `Reserved` = 'N' WHERE `Room_No` = ?";
                    if(!($unallocate = $mysqli->prepare($unallocate)))
                    {
                        //error_log('Prepare failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    }
                    else if(!($unallocate->bind_param('s', $room)))
                    {
                        //error_log('Bind param failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    }
                    else if(!($unallocate->execute()))
                    {
                        //error_log('Execution failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    }
                    $remove_hostel = "DELETE FROM `Hostelite` WHERE MIS = ?;";
                    if(!($remove_hostel = $mysqli->prepare($remove_hostel)))
                    {
                        //error_log('Prepare failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    }
                    else if(!($remove_hostel->bind_param('s', $mis)))
                    {
                        //error_log('Bind param failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    }
                    else if(!($remove_hostel->execute()))
                    {
                        //error_log('Execution failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    }
                    $jsonArray["result"] = "Room unallocated successfully!";
                }
            }
        }
    }
    echo json_encode($jsonArray);
?>