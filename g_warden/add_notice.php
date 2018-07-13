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
	require_once("../connect.php");
	require_once("../convert.php");

	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['noticeText']))
    {
		if(empty($_POST['category']) || empty($_POST['startDate']) || empty($_POST['endDate']) || empty($_POST['noticeText'])) {
			echo "Fields cannot be empty";
		}
		else {
			$category = $_POST['category'];
			$startDate = $_POST['startDate'];
			$endDate = $_POST['endDate'];
			$noticeText = $_POST['noticeText'];

			$convertedEndDate = convertDate($endDate);
			$convertedStartDate = convertDate($startDate);

			// echo $category." ".$convertedStartDate." ".$convertedEndDate." ".$noticeText;
			
			$stmt = $mysqli->prepare("INSERT INTO Notices (Category, Date_From, Notice_Text, Date_To) VALUES(?, ?, ?, ?)");
			$stmt->bind_param("ssss", $category, $convertedStartDate, $noticeText, $convertedEndDate);
			$stmt->execute();
			$stmt->close();

			echo "Success";
		}
	}
	else {
		echo "Fields cannot be empty";
	}
?>