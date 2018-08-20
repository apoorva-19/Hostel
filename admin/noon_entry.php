<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../403.html");
        exit;
    }
    if($_SESSION["user"] != "admin")
    {
        header("Location:../403.html");
        exit;
    }
    require_once('../connect.php');

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hostel_wing"]) && isset($_POST["room_no"]))
    {
        $date = date('Y-m-d');
        $hostel_wing = test_input($_POST["hostel_wing"]);
        $room_no = test_input($_POST["room_no"]);
        $fetch_details = "SELECT MIS, Noon_Count FROM Hostelite WHERE Room_No = ? AND Gender = ?";
        if($hostel_wing == 1)
            $gender = 'F';
        else    
            $gender = 'M';
        if(!($fetch_details = $mysqli->prepare($fetch_details)))
        {
            //error_log('Prepare failed for fetch details in noon_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        if(!($fetch_details->bind_param('ss', $room_no, $gender)))
        {
            //error_log('Bind param failed for fetch details in noon_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        if(!($fetch_details->execute()))
        {
            //error_log('Execution failed for fetch details in noon_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        $fetch_res = $fetch_details->get_result();
        if($fetch_res->num_rows == 0)
        {
            //error_log('Student not found in noon_entry.php');
            $jsonArray["result"] = "Student does not exist. Please check the room number entered.";
            
        }
        $fetch_row = $fetch_res->fetch_assoc();
        $insert_noon_record = "INSERT INTO Noon_Record(MIS, Room_No, Date) VALUES(?,?,?);";
        if(!($insert_noon_record = $mysqli->prepare($insert_noon_record)))
        {
            //error_log('Prepare failed for insert details in noon_record in noon_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        if(!($insert_noon_record->bind_param('sss', $fetch_row['MIS'], $room_no, $date)))
        {
            //error_log('Bind param failed for insert details in noon_record in noon_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        if(!($insert_noon_record->execute()))
        {
            //error_log('Execution failed for insert details in noon_record in noon_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        $update = "UPDATE Hostelite SET Noon_Count = ? WHERE MIS = ?";
        if(!($update = $mysqli->prepare($update)))
        {
            //error_log('Prepare failed for update details in noon_record in noon_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        $fetch_row["Noon_Count"]++;
        if(!($update->bind_param('is', $fetch_row["Noon_Count"], $fetch_row["MIS"])))
        {
            //error_log('Bind param failed for update details in noon_record in noon_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        if(!($update->execute()))
        {
            //error_log('Execution failed for update details in noon_record in noon_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        $jsonArray['result'] = "Entry made successfully!";
        echo json_encode($jsonArray);
    }
?>