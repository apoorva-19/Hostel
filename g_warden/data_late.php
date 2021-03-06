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
    require_once('../connect.php');
    require_once('../convert.php');
    $jsonArray = array();
    $g_tr = array();
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["start_date"]) && isset($_POST["end_date"]))
    {
        $start_date = convertDate(test_input($_POST["start_date"]));
        $end_date = convertDate(test_input($_POST["end_date"]));
        $g_hostel = "SELECT Hostelite.MIS, Hostelite.Name, Late_Record.Room_No, Date, Time, Late_Count FROM Late_Record INNER JOIN Hostelite ON Late_Record.MIS = Hostelite.MIS WHERE Date BETWEEN ? AND ? AND Hostelite.Gender = 'F';";
        
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
            $g_tr[] = "<tr><th scope=\"row\">".$cnt."</th><td>".$g_row['Name']."</td><td>".$g_row['MIS']."</td><td>".$g_row['Room_No']."</td><td>".$g_row['Date']."</td><td>".$g_row['Time']."</td><td>".$g_row['Late_Count']."</td></tr>";
            $cnt += 1;
        }
        
        $array = array("exception"=>$jsonArray, "gTr"=>$g_tr);
        echo json_encode($array);
    }
?>