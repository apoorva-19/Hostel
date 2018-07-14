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
    require_once('../connect.php');
    $jsonResponse = array();
    $sql = "";
    if($_GET["option"] === "1")
        $sql = "SELECT `Name`, `MIS`, `Email_Id`, `City`, `Admission_Type`, `Receipt_No`, `Amount_Paid`, `Room_No` FROM `Hostelite` WHERE YEAR(`Reg_Date`) = ? ORDER BY `Name`";
    else if($_GET["option"] === "2")
        $sql = "SELECT `Name`, `MIS`, `Email_Id`, `City`, `Admission_Type`, `Receipt_No`, `Amount_Paid`, `Room_No` FROM `Hostelite` WHERE YEAR(`Reg_Date`) = ? AND `Gender` = 'F' ORDER BY `Name`";
    else if($_GET["option"] === "3")
        $sql = "SELECT `Name`, `MIS`, `Email_Id`, `City`, `Admission_Type`, `Receipt_No`, `Amount_Paid`, `Room_No` FROM `Hostelite` WHERE YEAR(`Reg_Date`) = ? AND `Gender` = 'M' ORDER BY `Name`";
    else
    {
        $jsonResponse["status"] = "failure";
        $jsonResponse["message"] = "Please enter a valid option";
        echo json_encode($jsonResponse);
        exit;
    }
    if(!$get_hostelites = $mysqli->prepare($sql))
    {
        $jsonResponse["status"] = "failure";
        $jsonResponse["message"] = "An internal error was encountered. Please try again later";
    }
    else if(!$get_hostelites->bind_param('s', date("Y")))
    {
        $jsonResponse["status"] = "failure";
        $jsonResponse["message"] = "An internal error was encountered. Please try again later";
    }
    else if(!$get_hostelites->execute())
    {
        $jsonResponse["status"] = "failure";
        $jsonResponse["message"] = "An internal error was encountered. Please try again later";
    }
    else
    {
        $records = array();
        $result = $get_hostelites->get_result();
        while($row = $result->fetch_array(MYSQLI_NUM))
        {
            if($row[4] == "M")
                $row[4] = "Management";
            else if($row[4] == "C")
                $row[4] = "CAP Round";
            else if($row[4] == "P")
                $row[4] = "PIO";
            else if($row[4] == "CI")
                $row[4] = "CIWGC";
            else if($row[4] == "JK")
                $row[4] = "Jammu and Kashmir";
            else if($row[4] == "DSE")
                $row[4] = "Direct Second Year";
            else
                $row[4] = "Others";
            array_push($records, $row);
        }
        $jsonResponse["status"] = "success";
        $jsonResponse["message"] = "Records returned successfully!";
        $jsonResponse["noOfRecords"] = $result->num_rows;
        $jsonResponse["records"] = $records;
    }
    echo json_encode($jsonResponse);
?>
