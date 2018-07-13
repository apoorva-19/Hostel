<?php
    require_once('../connect.php');
    $error=false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
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
            $category_complaint = test_input($_POST["category_complaint"]);
            $complaint_text = test_intput($_POST["complaint_text"]);
            $mis = test_input($_SESSION["user"]);
            $get_room_no = "SELECT * FROM `Hostelite` WHERE `MIS` = ?";
            if(!($get_room_no = $mysqli->prepare($get_room_no)))
            {
                //error_log('Prepare failed for accepting complaints in complaints.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!($get_room_no->bind_param("s",$mis)))
            {
                //error_log('Bind param failed for accepting complaints in complaints.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!($get_room_no->execute()))
            {
                //error_log('Execution failed for accepting complaints in complaints.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            $res_room_no = $get_room_no->get_result();
            $row_room_no = $res_room_no->fetch_assoc();
            $room_no = $row_room_no["Room_No"];
            $accept = "INSERT INTO `G_Complaints` (`Room_No`, `Category`, `Complaint_Text`) VALUES (?,?,?);";
            if(!($accept = $mysqli->prepare($accept)))
            {
                //error_log('Prepare failed for accepting complaints in complaints.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!($accept->bind_param("sss", $room_no, $category_complaint, $complaint_text)))
            {
                //error_log('Bind param failed for accepting complaints in complaints.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!($accept->execute()))
            {
                //error_log('Execution failed for accepting complaints in complaints.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            echo "<script>swal({
                title: 'Done!',
                text: 'Your complaint has been accepted. We'll try to solve it at the earliest.',
                type: 'success'
            })</script>";
        }
    }
    function validateInput()
    {
        
    }
?>