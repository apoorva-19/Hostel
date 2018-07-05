<?php
    require_once("../connect.php");
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["misID"]))
    {
        $jsonArray = array();
        $mis = test_input($_POST["misID"]);
        $fetch_mis = "SELECT * FROM `New_Registrations` WHERE `MIS` = ?";
        if(!($fetch_mis = $mysqli->prepare($fetch_mis)))
        {
            error_log('Prepare failed for unallocating room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($fetch_mis->bind_param('s', $mis)))
        {
            error_log('Bind param failed for unallocating room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($fetch_mis->execute()))
        {
            error_log('Execution failed for unallocating room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if($result = $fetch_mis->get_result())
        {
            $row = $result->fetch_assoc();
            if($mis == $row["MIS"])
            {   
                $reset_room_no = "UPDATE `New_Registrations` SET `Room_No` = '0' WHERE `MIS` = ?";
                if(!($reset_room_no = $mysqli->prepare($reset_room_no)))
                {
                    error_log('Prepare failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    exit;
                }
                if(!($reset_room_no->bind_param('s', $mis)))
                {
                    error_log('Bind param failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    exit;
                }
                if(!($reset_room_no->execute()))
                {
                    error_log('Execution failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                    $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                    exit;
                }
                else
                {
                    $unallocate = "UPDATE `B_Room` SET `Reserved` = 'N' WHERE `Room_No` = ?";
                    if(!($unallocate = $mysqli->prepare($unallocate)))
                    {
                        error_log('Prepare failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                        exit;
                    }
                    if(!($unallocate->bind_param('s', $row["Room_No"])))
                    {
                        error_log('Bind param failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                        exit;
                    }
                    if(!($unallocate->execute()))
                    {
                        error_log('Execution failed for resetting room number in unallocate.php: ('.$mysqli->errno.') '.$mysqli->error);
                        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
                        exit;
                    }
                    $jsonArray["result"] = "Room unallocated successfully!";
                }
            }
        }
    }
    echo json_encode($jsonArray);
?>