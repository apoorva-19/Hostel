<?php
    session_start();
    if(empty(trim($_SESSION["user"])))
    {
        header("Location:../404.html");
        exit;
    }
    if(empty(trim($_SESSION["gender"])))
    {
        header("Location:../404.html");
        exit;
    }
    if($_SESSION["user"] != $_COOKIE["user"])
    {
        header("Location:../404.html");
        exit;
    }
    if($_SESSION["gender"] != "F" || $_SESSION["gender"] != "M" || $_SESSION["gender"] != "O")
    {
        header("Location:../404.html");
        exit;
    }
    require_once('../connect/php');
    $error = false;
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
            $category_suggestion = test_input($_POST["category_suggestion"]);
            $suggestion_text = test_input($_POST["suggestion_text"]);
            $sql = "INSERT INTO `Suggestions`(`Category`, `Date`, `Suggestion_Text`) VALUES (?,'".date('Y-m-d')."',?);";
            if(!($sql = $mysqli->prepare($sql)))
            {
                //error_log('Prepare failed for accepting suggestions in suggestions.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!($sql->bind_param("ss", $category_suggestion, $suggestion_text)))
            {
                //error_log('Bind param failed for accepting suggestions in suggestions.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!($sql->execute()))
            {
                //error_log('Execute failed for accepting suggestions in suggestions.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            echo "<script>swal({
                title: 'Done!',
                text: 'Thank you for your suggestion. We'll defintely consider,
                type: 'success'
            })</script>";
        }
    }
?>