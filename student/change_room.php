<?php
    require_once('../connect.php');
    $errors = false;
    if(($_SERVER["REQUEST_METHOD"] == "POST"))
    {
        if(!validateInput())
        {
            echo "<script>swal({
                                title: 'Invalid data entered!',
                                text: 'Invalid data has been entered in some fields. Please check all fields and try again',
                                type: 'error'});</script>";
            $errors = true;
        }
        else
        {
            $mis = test_input($_SESSION["user"]);
            $room_mate2 = test_input($_POST["room_mate2"]);
            $reason = test_input($_POST["reason"]);
            $verify_student = "SELECT * FROM `Hostelite` WHERE `Room_No` = ?;";
            if(!($verify_student = $mysqli->prepare($verify_student)))
            {
                //error_log('Prepare failed for verifying student in change_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!($verify_student->bind_param('s', $room_mate2)))
            {
                //error_log('Bind param failed for verifying student in change_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!$verify_student->execute())
            {
                //error_log('Execution failed for verifying student in change_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            $res_verify = $verify_student->get_result();
            if($res_verify->num_rows != 1)
            {
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. Room mate's room number was incorrect.',
                    type: 'error'
                })</script>";
                exit;
            }
            else
            {
                $room_number_2 = substr($room_mate2, 0,3);
                $side_2 = substr($room_mate2,2,1);
                $get_room_number = "SELECT `Room_No` FROM `Hostelite` WHERE `MIS` = ?;";
                if(!($get_room_number = $mysqli->prepare($get_room_number)))
                {
                    //error_log('Prepare failed for getting the room number of the requesting student in change_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                    echo "<script>swal({
                        title: 'Error',
                        text: 'Request could not be processed. We are trying to fix the error.',
                        type: 'error'
                    })</script>";
                    exit;
                }
                if(!($get_room_number->bind_param('s', $mis)))
                {
                    //error_log('Bind Param failed for getting the room number of the requesting student in change_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                    echo "<script>swal({
                        title: 'Error',
                        text: 'Request could not be processed. We are trying to fix the error.',
                        type: 'error'
                    })</script>";
                    exit;
                }
                if(!($get_room_number->execute()))
                {
                    //error_log('Execution failed for getting the room number of the requesting student in change_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                    echo "<script>swal({
                        title: 'Error',
                        text: 'Request could not be processed. We are trying to fix the error.',
                        type: 'error'
                    })</script>";
                    exit;
                }
                $res_get_room_number = $get_room_number->get_result();
                if($res_get_room_number->num_rows != 1)
                {
                    echo "<script>swal({
                        title: 'Error',
                        text: 'Request could not be processed. Room mate's room number was incorrect.',
                        type: 'error'
                    })</script>";
                    exit;
                }
                else
                {
                    $row_get_room_number = $res_get_room_number->fetch_assoc();
                    $room_number = substr($row_get_room_number["`Room_No`"],0,3);
                    $side = substr($row_get_room_number["`Room_No`"],2,1);
                    if($side == 'A')
                    {
                        $room_mate3 = $room_number."B";
                    }
                    else
                    {
                        $room_mate3 = $room_number."A";
                    }
                    if($side_2 == 'A')
                    {
                        $room_mate4 = $room_number."B";
                    }
                    else
                    {
                        $room_mate4 = $room_number."A";
                    }
                    $verify_room_mate = "SELECT * FROM `Hostelite` WHERE `Room_No` = ?;";
                    if(!($verify_room_mate = $mysqli->prepare($verify_room_mate)))
                    {
                        //error_log('Prepare failed for fetching room_mate3 in changing_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                        echo "<script>swal({
                            title: 'Error',
                            text: 'Request could not be processed. We are trying to fix the error.',
                            type: 'error'
                        })</script>";
                        exit;
                    }
                    if(!($verify_room_mate_3->bind_param('s', $room_mate3)))
                    {
                        //error_log('Bind param failed for fetching room_mate3 in changing_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                        echo "<script>swal({
                            title: 'Error',
                            text: 'Request could not be processed. We are trying to fix the error.',
                            type: 'error'
                        })</script>";
                        exit;
                    }
                    if(!($verify_room_mate_3->execute()))
                    {
                        //error_log('Execution failed for fetching room_mate3 in changing_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                        echo "<script>swal({
                            title: 'Error',
                            text: 'Request could not be processed. We are trying to fix the error.',
                            type: 'error'
                        })</script>";
                        exit;
                    }
                    $msg_room_mate = 'INSERT INTO `G_Messages`(`Category`, `Room_No`, `Date`, `Msg_Text`) VALUES(?,?,"'.date('Y-m-d').'",?);';
                    $category = "Room change";
                    $msg_text = "Your room partner has requested a change of room. Would you like to provide your consent?";
                    if(!($msg_room_mate = $mysqli->prepare($msg_room_mate)))
                    {
                        //error_log('Prepare failed for sending message to room_mate3 in changing_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                        echo "<script>swal({
                            title: 'Error',
                            text: 'Request could not be processed. We are trying to fix the error.',
                            type: 'error'
                        })</script>";
                        exit;
                    }
                    $res_verify_room_mate3 = $verify_room_mate_3->get_result();
                    if($row = $res_verify_room_mate3->fetch_assoc())
                    {
                        if(!($msg_room_mate_3->bind_param('sss', $category, $room_mate3, $msg_text)))
                        {
                            //error_log('Bind param failed for sending message to room_mate3 in changing_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                            echo "<script>swal({
                                title: 'Error',
                                text: 'Request could not be processed. We are trying to fix the error.',
                                type: 'error'
                            })</script>";
                            exit;
                        }
                        if(!($msg_room_mate_3->execute()))
                        {
                            //error_log('Execute failed for sending message to room_mate3 in changing_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                            echo "<script>swal({
                                title: 'Error',
                                text: 'Request could not be processed. We are trying to fix the error.',
                                type: 'error'
                            })</script>";
                            exit;
                        }
                        $flag = 1;
                    }
                    if(!($verify_room_mate_4->bind_param('s', $room_mate4)))
                    {
                        //error_log('Bind param failed for fetching room_mate4 in changing_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                        echo "<script>swal({
                            title: 'Error',
                            text: 'Request could not be processed. We are trying to fix the error.',
                            type: 'error'
                        })</script>";
                        exit;
                    }
                    if(!($verify_room_mate_4->execute()))
                    {
                        //error_log('Execution failed for fetching room_mate4 in changing_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                        echo "<script>swal({
                            title: 'Error',
                            text: 'Request could not be processed. We are trying to fix the error.',
                            type: 'error'
                        })</script>";
                        exit;
                    }
                    $res_verify_room_mate4 = $verify_room_mate_4->get_result();
                    if($row = $res_verify_room_mate4->fetch_assoc())
                    {
                        if(!($msg_room_mate_4->bind_param('sss', $category, $room_mate4, $msg_text)))
                        {
                            //error_log('Bind param failed for sending message to room_mate4 in changing_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                            echo "<script>swal({
                                title: 'Error',
                                text: 'Request could not be processed. We are trying to fix the error.',
                                type: 'error'
                            })</script>";
                            exit;
                        }
                        if(!($msg_room_mate_4->execute()))
                        {
                            //error_log('Execute failed for sending message to room_mate4 in changing_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                            echo "<script>swal({
                                title: 'Error',
                                text: 'Request could not be processed. We are trying to fix the error.',
                                type: 'error'
                            })</script>";
                            exit;
                        }
                        $flag = 2;
                    }
                }
            }
            echo "<script>swal({
                title: 'Done!',
                text: 'Request has been saved. The warden will get in touch with you soon.',
                type: 'success'
            })</script>";
        }
    }
    function validateInput()
    {
        $valid = true;
        if(!(isset($_POST["room_mate2"]) && $_POST["room_mate2"] != "" && preg_match('/^[0-9]{3}[AB]{1}$/',$_POST["room_mate2"])))
        {
            $valid = false;
        }
        return $valid;
    }
?>