<!DOCTYPE html>
<html>
<head>
    <!-- Sweet Alert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
</head>
<body>
    <!-- Sweet Alert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>
</body>
</html>
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
            date_default_timezone_set('Asia/Kolkata');
            $time = date('H:i');
            $lunch_time = date('H:i', strtotime("10:00"));
            $dinner_time = date('H:i', strtotime("14:00"));
            $lunch = test_input($_POST["meal"][0]);
            $dinner = test_input($_POST["meal"][1]);
            $previous = "javascript:history.go(-1)";
            if(isset($_SERVER['HTTP_REFERER'])) {
                $previous = $_SERVER['HTTP_REFERER'];
            }
            if($lunch == 2)
            {
                $lunch = 0;
                $dinner = 1;
            }
            if(!$lunch && !$dinner)
            {
                echo "<script>swal({
                    title: 'Error',
                    text: 'No choice made.',
                    type: 'error'
                })</script>";
                exit;   
            }
            if($lunch && $time < $lunch_time)
                $lunch = 1;
            else
                $lunch = 0;
            if($dinner && $time < $dinner_time)
                $dinner = 1;
            else
                $dinner = 0;
            if(!$lunch && !$dinner)
            {   
                echo "<script>swal({
                    title: 'Error',
                    text: 'Sorry. You are late.',
                    type: 'error',
                    confirmButtonText: 'Okay'
                }).then((result)=>{
                    if(result.value)
                        window.location.href='".$previous."';
                });</script>";
                exit;
            }
            $sql = "INSERT INTO `Lunch_Dinner`(`Lunch`, `Dinner`, `Date`) VALUES (?,?,'".date('Y-m-d')."');";
            if(!($sql = $mysqli->prepare($sql)))
            {
                //error_log('Prepare failed in decline_meal.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!($sql->bind_param('ii', $lunch, $dinner)))
            {
                //error_log('Bind Param failed in decline_meal.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!($sql->execute()))
            {
                //error_log('Execution failed in decline_meal.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            echo "<script>swal({
                title: 'Done!',
                text: 'Thank you for help is prevent wastage of food',
                type: 'success'
            }).then((result)=>{
                if(result.value)
                    window.location.href='".$previous."';
            });</script>";
        }
    }
    function validateInput()
    {
        
    }
?>