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
    require_once('base.php');
    require_once('../connect.php');
    require_once('../convert.php');
    $errors = false;
    if(($_SERVER["REQUEST_METHOD"] == "POST"))
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
            $in_time = convertDateTime(test_input($_POST["in_time"]));
            $out_time = convertDateTime(test_input($_POST["out_time"]));
            $guardian_address = test_input($_POST["guardian_address"]);
            // $p_consent = test_input($_POST["p_consent"]);
            // $w_consent = test_input($_POST["w_consent"]);
            $mis = test_input($_SESSION["user"]);
            
            $sql = "SELECT `Name`,`Room_No`,`M_Contact` FROM `Hostelite` WHERE `MIS` = ?;";
            if(!($verify_mis = $mysqli->prepare($sql)))
            {
                //error_log('Binding failed for mis checking in night.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>$(document).ready(function(){
                    swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                    });
                    
                })</script>";

            }
            else
            {
                if(!($verify_mis->bind_param('s',$mis)))
                {
                    //error_log('Binding failed for mis checking in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                    echo "<script>$(document).ready(function(){
                        swal({
                        title: 'Error',
                        text: 'Request could not be processed. We are trying to fix the error.',
                        type: 'error'
                        });
                        
                    })</script>";
                }
                else
                {
                    if(!$verify_mis->execute())
                    {
                        //error_log('Execution failed for verifying student in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                        echo "<script>$(document).ready(function(){
                            swal({
                            title: 'Error',
                            text: 'Request could not be processed. We are trying to fix the error.',
                            type: 'error'
                            });
                            
                        })</script>";
                    }
                    else
                    {
                        $res = $verify_mis->get_result();
                        if($res->num_rows == 0)
                        {
                            echo "<script>$(document).ready(function(){
                                swal({
                                title: 'Error',
                                text: 'This MIS id has not registered for the hostel',
                                type: 'error'
                                });
                                
                            })</script>";
                        }
                        else
                        {
                            $row = $res->fetch_assoc();
                            $Name = $row["Name"];
                            $p_contact = $row["M_Contact"];
                            $room_no = $row["Room_No"];
                            $insert = "INSERT INTO `G_Night_Permission`(`Datetime_Out`, `Datetime_In`,`Address`,`P_Contact`,`Room_No`) VALUES ('".$in_time."','".$out_time."',?,?,?);";
                            if(!($insert = $mysqli->prepare($insert)))
                            {
                                //error_log('Prepare failed for vehicle registration in vehicle_registration.php: ('.$mysqli->errno.') '.$mysqli->error);
                                echo "<scriptS>swal({
                                    title: 'Error',
                                    text: 'Request could not be processed. We are trying to fix the error.',
                                    type: 'error'
                                })</script>";
                                exit;
                            }
                            if(!$insert->bind_param('sss',$guardian_address,$p_contact,$room_no))
                            {
                                //error_log('Bind param failed for night form in night.php: ('.$mysqli->errno.') '.$mysqli->error);
                                echo "<script>swal({
                                    title: 'Error',
                                    text: 'Request could not be processed. We are trying to fix the error.',
                                    type: 'error'
                                })</script>";
                                exit;
                            }
                            if(!$insert->execute())
                            {
                                //error_log('Execution failed for night form in night.php: ('.$mysqli->errno.') '.$mysqli->error);
                                echo "<script>swal({
                                    title: 'Error',
                                    text: 'Request could not be processed. We are trying to fix the error.',
                                    type: 'error'
                                })</script>";
                                exit;
                            }
                            echo "<script>swal({
                                title: 'Done!',
                                text: 'Form filled.',
                                type: 'success'
                            })</script>";
                        }
                    }
                
                }
            }
        }
    }
            
    function validateInput()
    {
        return true;
    }
?>
<!DOCTYPE html>
<html>
<script>
    // window.onload = function() {
    //     document.getElementById("menu_night").classList.add("active");
    // }
</script>
<body class="theme-indigo">
    <section class="content">
        <div class="container-fluid">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Night Form</h2><br>
                        <small><b>Important Note:</b><br>
                            1. All Fields of this form are mandatory<br>
                            2. This form is to be submitted at least 1 day before actual date of leave<br>
                            3. This form remains invalid if it is not validated by the Parent and Warden.
                        </small>
                    </div>
                    <div class="body">
                        <form action="/Hostel/student/night.php" id="night_form" method="post">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <label class="required" for="out_time">Out Time</label>
                                                <input type="text" id="out_time" name="out_time" class="datetimepicker form-control" placeholder="Pick Date and Time...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <label class="required" for="in_time">In Time</label>
                                                <input type="text" id="in_time" name="in_time" class="datetimepicker form-control" placeholder="Pick Date and Time...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="required" for="gurdian_address">Address</label>
                                            <textarea id="guardian_address" rows="1" class="form-control no-resize auto-growth" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" style="float: right;">Submit</button>
                                <br><br>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
