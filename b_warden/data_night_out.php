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
    $b_tr = array();
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["start_date"]) && isset($_POST["end_date"]))
    {
        $start_date = convertDate(test_input($_POST["start_date"]));
        $end_date = convertDate(test_input($_POST["end_date"]));
        $b_hostel = "SELECT Hostelite.MIS, Hostelite.Name, Hostelite.Room_No, DATE_FORMAT(Datetime_Out, '%Y-%m-%d'), DATE_FORMAT(Datetime_In, '%Y-%m-%d') FROM B_Night_Permission INNER JOIN Hostelite ON B_Night_Permission.MIS = Hostelite.MIS WHERE DATE_FORMAT(Datetime_Out, '%Y-%m-%d') <= ? AND DATE_FORMAT(Datetime_In, '%Y-%m-%d') >= ?;";
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
            $b_tr[] = "<tr><th scope=\"row\">".$cnt."</th><td>".$b_row['Name']."</td><td>".$b_row['MIS']."</td><td>".$b_row['Room_No']."</td><td>".$b_row["DATE_FORMAT(Datetime_Out, '%Y-%m-%d')"]."</td><td>".$b_row["DATE_FORMAT(Datetime_In, '%Y-%m-%d')"]."</td><td>".$b_row['Night_Out_Count']."</td></tr>";
            $cnt += 1;
        }
        $array = array("exception"=>$jsonArray, "bTr"=>$b_tr);
        echo json_encode($array);
    }
?>