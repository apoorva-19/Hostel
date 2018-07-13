<?php
    session_start();
    if(!(isset($_SESSION["user"]) || $_SESSION["user"] === "admin"))
    {
        header("Location:../404.html");
        exit;
    }
    require_once('../connect.php');
    require_once('../convert.php');
    $jsonArray = array();
    $g_tr = array();
    $b_tr = array();
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["start_date"]) && isset($_POST["end_date"]))
    {
        $start_date = convertDate(test_input($_POST["start_date"]));
        $end_date = convertDate(test_input($_POST["end_date"]));
        $g_hostel = "SELECT Lunch_Dinner.MIS, Name, Lunch_Dinner.Room_No, Date, Lunch, Dinner FROM Lunch_Dinner INNER JOIN Hostelite ON Lunch_Dinner.MIS = Hostelite.MIS AND Gender = 'F' AND Date >= ? AND Date <= ?;";
        $b_hostel = "SELECT Lunch_Dinner.MIS, Name, Lunch_Dinner.Room_No, Date, Lunch, Dinner FROM Lunch_Dinner INNER JOIN Hostelite ON Lunch_Dinner.MIS = Hostelite.MIS AND Gender = 'M' AND Date >= ? AND Date <= ?;";
    
        if(!($g_hostel = $mysqli->prepare($g_hostel)))
        {
            //error_log('Prepare failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($g_hostel->bind_param('ss',$start_date, $end_date)))
        {
            //error_log('Execution failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($g_hostel->execute()))
        {
            //error_log('Execution failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        $g_res_hostel = $g_hostel->get_result();
        $cnt=1;
    
        while($g_row = $g_res_hostel->fetch_assoc())
        {
            $g_tr[] = "<tr><th scope=\"row\">".$cnt."</th><td>".$g_row['Name']."</td><td>".$g_row['Lunch_Dinner.MIS']."</td><td>".$g_row['Lunch_Dinner.Room_No']."</td><td>".$g_row['Lunch']."</td><td>".$g_row['Dinner']."</td><td>".$g_row['Date']."</td></tr>";
            $cnt += 1;
        }
        
        if(!($b_hostel = $mysqli->prepare($b_hostel)))
        {
            //error_log('Prepare failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($b_hostel->bind_param('ss',$start_date, $end_date)))
        {
            //error_log('Execution failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        if(!($b_hostel->execute()))
        {
            //error_log('Execution failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
            $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
            exit;
        }
        $b_res_hostel = $b_hostel->get_result();
        $cnt=1;

        while($b_row = $b_res_hostel->fetch_assoc())
        {
            $b_tr[] = "<tr><th scope=\"row\">".$cnt."</th><td>".$b_row['Name']."</td><td>".$b_row['Lunch_Dinner.MIS']."</td><td>".$b_row['Lunch_Dinner.Room_No']."</td><td>".$b_row['Lunch']."</td><td>".$b_row['Dinner']."</td><td>".$b_row['Date']."</td></tr>";
            $cnt += 1;
        }
        $array = array("exception"=>$jsonArray, "gTr"=>$g_tr, "bTr"=>$b_tr);
        echo json_encode($array);
    }
?>