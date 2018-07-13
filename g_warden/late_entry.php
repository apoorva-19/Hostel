<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../404.html");
        exit;
    }
    if($_SESSION["user"] != "g_warden")
    {
        header("Location:../404.html");
        exit;
    }
    require_once('../convert.php');
    require_once('../connect.php');

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["room_no"]) && isset($_POST["time"]) && isset($_POST["reason"]))
    {
        $date = date('Y-m-d');
        $room_no = test_input($_POST["room_no"]);
        $time = convertTime(test_input($_POST["time"]));
        $reason = test_input($_POST["reason"]);
        $fetch_details = "SELECT MIS, Late_Count FROM Hostelite WHERE Room_No = ? AND Gender = ?;";
        $gender = 'F';
        if(!($fetch_details = $mysqli->prepare($fetch_details)))
        {
            ////error_log('Prepare failed for fetch details in late_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        if(!($fetch_details->bind_param('ss', $room_no, $gender)))
        {
            //error_log('Bind param failed for fetch details in late_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        if(!($fetch_details->execute()))
        {
            //error_log('Execution failed for fetch details in late_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        $fetch_res = $fetch_details->get_result();
        if($fetch_res->num_rows == 0)
        {
            //error_log('Student not found in late_entry.php');
            $jsonArray["result"] = "Student does not exist. Please check the room number entered.";
            
        }
        $fetch_row = $fetch_res->fetch_assoc();
        $insert_late_record = "INSERT INTO Late_Record(MIS, Room_No, Date, Time, Reason) VALUES(?,?,?,?,?);";
        if(!($insert_late_record = $mysqli->prepare($insert_late_record)))
        {
            //error_log('Prepare failed for insert details in late_record in late_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        if(!($insert_late_record->bind_param('sssss', $fetch_row['MIS'], $room_no, $date, $time, $reason)))
        {
            //error_log('Bind param failed for insert details in late_record in late_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        if(!($insert_late_record->execute()))
        {
            //error_log('Execution failed for insert details in late_record in late_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        $update = "UPDATE Hostelite SET Late_Count = ? WHERE MIS = ?";
        if(!($update = $mysqli->prepare($update)))
        {
            //error_log('Prepare failed for update details in late_record in late_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        $fetch_row["Late_Count"]++;
        if(!($update->bind_param('is', $fetch_row["Late_Count"], $fetch_row["MIS"])))
        {
            //error_log('Bind param failed for update details in late_record in late_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        if(!($update->execute()))
        {
            //error_log('Execution failed for update details in late_record in late_entry.php');
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            
        }
        $jsonArray['result'] = "Entry made successfully!";

        echo json_encode($jsonArray);
    }
?>