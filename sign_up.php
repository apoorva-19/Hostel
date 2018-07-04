<?php
    require_once("convert.php");
    require_once("connect.php");
    echo '<script src=" plugins/jquery/jquery.min.js"></script>';
    echo '<script src=" plugins/jquery-validation/jquery.validate.js"></script>';
    if(($_SERVER["REQUEST_METHOD"] == "POST"))
    {
        if(!validateSignUpInput())
        {
            echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var inputElements = document.getElementsByClassName('inputDiv');
                            var selectElements = document.getElementsByClassName('selectDiv');
                            for(var i = 0; i < inputElements.length; i++) {
                                inputElements[i].onkeypress = function() { this.classList.remove('focused'); };
                                inputElements[i].onkeypress = function() { this.classList.remove('error'); };
                            }
                            for(var i = 0; i < selectElements.length; i++) {
                                selectElements[i].onclick = function() { this.classList.remove('form-line'); };
                                selectElements[i].onclick = function() { this.classList.remove('focused'); };
                                selectElements[i].onclick = function() { this.classList.remove('error'); };
                            }
                        });
                    </script>";
        }   
        else
        {
            $name = test_input($_POST["stud_name"]);
            $gender = test_input($_POST["stud_gender"]);
            $admissionType = test_input($_POST["admission_type"]);
            $dob = convertDate(test_input($_POST["stud_dob"]));
            $mis = test_input($_POST["stud_mis"]);
            $email = test_input($_POST["stud_email"]);
            $contact = test_input($_POST["stud_contact"]);
            $branch = test_input($_POST["stud_branch"]);
            $year = test_input($_POST["stud_year"]);
            $receipt = test_input($_POST["stud_receipt"]);
            $amtPaid = test_input($_POST["amt_paid"]);
            $date = date('Y-m-d');

			// $verify_mis = "SELECT MIS FROM `New_Registrations` WHERE MIS = '".$_POST["stud_mis"]."';";
			$sql = "SELECT `MIS` FROM `New_Registrations` WHERE `MIS` = ?;";
			if(!($verify_mis = $mysqli->prepare($sql)))
			{
				error_log('Prepare failed for mis checking in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
            }
            if(!($verify_mis = $mysqli->bind_param('s', $mis)))
            {
                error_log('Binding failed for mis checking in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
            }
            if(!$verify_mis->execute())
            {
                error_log('Execution failed for verifying student in change_room.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
            }
            $res = $verify_mis->get_result();
            if($res->num_rows == 1)
            {
                echo "<script>swal({
                    title: 'Error',
                    text: 'This MIS id has already registered for the hostel',
                    type: 'error'
                })</script>";
            }
            else
            {
                $insert_stud = "INSERT INTO `New_Registrations`(`Name`, `Gender`, `Admission_Type`, `DOB`, `MIS`, `Email_Id`, `Contact_Number`, `Branch`, `Year`, `Receipt_No`, `Amount_Paid`, `Reg_Date`) VALUES ('".$_POST["stud_name"]."','".$_POST["stud_gender"]."','".$_POST["admission_type"]."','".convertDate($_POST["stud_dob"])."','".$_POST["stud_mis"]."','".$_POST["stud_email"]."',".$_POST["stud_contact"].",'".$_POST["stud_branch"]."',".$_POST["stud_year"].",'".$_POST["stud_receipt"]."',".$_POST["amt_paid"].",'".date('Y-m-d')."');";
                    // echo '<script>alert("'.$insert_stud.'");</script>';
                if($res = mysqli_query($mysqli, $insert_stud))
                {
                    echo "<script>alert('Sign up completed successfully!');</script>";
                    // echo "<script>swal({
                    //     title: 'Done!',
                    //     text: 'Sign up completed successfully!',
                    //     type: 'success',
                    //     confirmButtonText: 'Ok'}, function(isConfirm) { if(isConfirm) { window.location.href = 'sign_up.php'; } });</script>";
                }
                else
                {
                    echo "<script>alert('Failed to sign up');</script>";
                    // echo "<script>swal({
                    //     title: 'Error!',
                    //     text: 'An unexpected error occured. Please contact the system administrator',
                    //     type: 'error'});</script>";
                    // echo "<script>alert('Failed to sign up');</script>";
                }
            }
            // if($res = mysqli_query($mysqli, $verify_mis))
            // {
            //     if(mysqli_num_rows($res)) //checking for duplicate entries
            //         echo "<script>alert('Incorrect Registration ID');</script>";
            //     else
            //     {
            //         $insert_stud = "INSERT INTO `New_Registrations`(`Name`, `Gender`, `Admission_Type`, `DOB`, `MIS`, `Email_Id`, `Contact_Number`, `Branch`, `Year`, `Receipt_No`, `Amount_Paid`, `Reg_Date`) VALUES ('".$_POST["stud_name"]."','".$_POST["stud_gender"]."','".$_POST["admission_type"]."','".convertDate($_POST["stud_dob"])."','".$_POST["stud_mis"]."','".$_POST["stud_email"]."',".$_POST["stud_contact"].",'".$_POST["stud_branch"]."',".$_POST["stud_year"].",'".$_POST["stud_receipt"]."',".$_POST["amt_paid"].",'".date('Y-m-d')."');";
            //         // echo '<script>alert("'.$insert_stud.'");</script>';
            //         if($res = mysqli_query($mysqli, $insert_stud))
            //         {
            //             echo "<script>alert('Sign up completed successfully!');</script>";
            //             // echo "<script>swal({
            //             //     title: 'Done!',
            //             //     text: 'Sign up completed successfully!',
            //             //     type: 'success',
            //             //     confirmButtonText: 'Ok'}, function(isConfirm) { if(isConfirm) { window.location.href = 'sign_up.php'; } });</script>";
            //         }
            //         else
            //         {
            //             echo "<script>alert('Failed to sign up');</script>";
            //             // echo "<script>swal({
            //             //     title: 'Error!',
            //             //     text: 'An unexpected error occured. Please contact the system administrator',
            //             //     type: 'error'});</script>";
            //             // echo "<script>alert('Failed to sign up');</script>";
            //         }
            //     }
            // }
        }
    }

    function validateSignUpInput()
    {
		//TODO: Need to add validation for receipt number and amount paid
        $valid = true;
        if(!(isset($_POST["stud_name"]) && !(empty($_POST["stud_name"])) && preg_match('/^[a-zA-Z\s]{1,}[\.]{0,1}[a-zA-Z\s]{0,}$/',$_POST["stud_name"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_name').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_name' : 'Name can consist only of alphabets and the special dot character (.)' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_dob"]) && !(empty($_POST["stud_dob"])) && preg_match("/[a-zA-Z0-9\s]{1,}/", $_POST["stud_dob"])))
        {         
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_dob').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_dob' : 'Please enter a valid date of birth' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_mis"]) && !(empty($_POST["stud_mis"])) && preg_match("/[A-Z0-9]{11,12}/", $_POST["stud_mis"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_mis').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_mis' : 'Please enter a valid MIS ID consisting of 11 or 12 alphanumeric characters' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_email"]) && !(empty($_POST["stud_email"])) && filter_input(INPUT_POST, "stud_email", FILTER_VALIDATE_EMAIL)))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_email').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_email' : 'Please enter a valid email address' }) }, 100);
            });</script>";
            
        }
        if(!(isset($_POST["stud_contact"]) && !(empty($_POST["stud_contact"])) && preg_match('/^[6789]{1}[0-9]{9}/', $_POST["stud_contact"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_contact').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_contact' : 'Please enter a valid contact number' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_branch"]) && !(empty($_POST["stud_branch"])) && preg_match('/^CE$|^IT$|^EnTC$/', $_POST["stud_branch"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_branch').className += ' form-line focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_branch' : 'Please select a valid branch' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_year"]) && !(empty($_POST["stud_year"])) && preg_match('/[1-3]{1}/', $_POST["stud_year"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_year').className += ' form-line focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_year' : 'Please select a valid year of engineering' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_gender"]) && !(empty($_POST["stud_gender"])) && preg_match('/^F{1}|^M{1}|^O{1}/', $_POST["stud_gender"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_gender').className += ' form-line focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_gender' : 'Please select a valid gender' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["admission_type"]) && !(empty($_POST["admission_type"])) && preg_match('/^M{1}|^C{1}|^O{1}/', $_POST["admission_type"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('admission_type').className += ' form-line focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'admission_type' : 'Please select a valid admission type' }) }, 100);
            });</script>";
        }
        return $valid;
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href=" plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href=" plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href=" plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href=" plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href=" plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href=" plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href=" plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href=" plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href=" css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href=" css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">SCTR's PICT Hostel</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->

    <section class="content col-lg-8">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="card">
                    <div class="header">
                        <h2>Sign Up</h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="" id="signUpForm">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="stud_name">
                                            <label class="required" for="stud_name">Student's Name</label>
                                            <input type="text" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" class="form-control" name="stud_name" id="stud_name_input" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div id="stud_gender" class="selectDiv">
                                            <label class="required" for="stud_gender">Gender</label>
                                            <select id="stud_gender_input" name="stud_gender" class="form-control" required>
                                                <option value="F">Female</option>
                                                <option value="M">Male</option>
                                                <option value="O">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div id="admission_type" class="selectDiv">
                                            <label class="required" for="admission_type">Admission Quota</label>
                                            <select id="admission_type_input" name="admission_type" class="form-control" required>
                                                <option value="M">Management</option>
                                                <option value="C">CAP Round</option>
                                                <option value="O">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="stud_dob">
                                            <label class="required" for="stud_dob">Date of birth</label>
                                            <input type="text" class="datepicker form-control" placeholder="dd/mm/yy" name="stud_dob" id="stud_dob_input" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="stud_mis">
                                            <label class="required" for="stud_mis">MIS Number</label>
                                            <input type="text" pattern="[A-Z0-9]{11,12}" placeholder="MIS Login" class="form-control" name="stud_mis" id="stud_mis_input" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="stud_email">
                                            <label class="required" for="stud_email">Email Id</label>
                                            <input type="email" placeholder="someone@somewhere.com" class="form-control" name="stud_email" id="stud_email_input" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="stud_contact">
                                            <label class="required" for="stud_contact">Contact Number</label>
                                            <input type="text" pattern="[6789]{1}[0-9]{9}" placeholder="10 digit Indian mobile number" class="form-control" name="stud_contact" id="stud_contact_input" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div id="stud_branch" class="selectDiv">
                                            <label class="required" for="stud_branch">Branch</label>
                                            <select class="form-control" name="stud_branch" id="stud_branch_input" required>
                                                <option value="CE">CE</option>
                                                <option value="IT">IT</option>
                                                <option value="EnTC">EnTC</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <div id="stud_year" class="selectDiv">
                                            <label class="required" for="stud_year">Year</label>
                                            <select class="form-control" name="stud_year" id="stud_year_input" required>
                                                <option value="1">First Year</option>
                                                <option value="2">Second Year</option>
                                                <option value="3">Third Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="stud_receipt">
                                            <label class="required" for="stud_receipt">Hostel fee receipt number</label>
                                            <input type="text" class=" form-control" placeholder="Receipt Number for Hostel Reservation" name="stud_receipt" id="stud_receipt_input" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="amt_paid">
                                            <label class="required" for="amt_paid">Amount Paid for Hostel Reservation</label>
                                            <input type="text" placeholder="Amount Paid for Hostel Reservation" class="form-control" name="amt_paid" id="amt_paid_input" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="selectDiv" id="amt_paid">
                                            <label for="mode_trans" class="required">Mode of Transaction</label>
                                            <select class="form-control" name="mode_trans" id="mode_trans_input" required>
                                                <option value="1">Offline</option>
                                                <option value="2">Online</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
							</div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="stud_city">
                                            <label class="required" for="stud_city">City of permanent residence</label>
                                            <input type="text" placeholder="City of permanent residence" class="form-control"
                                            name="stud_city" id="stud_city_input" required>
                                            <div class="help-info">
                                                Hostel will be alloted to those students whose radial distance is more than 40 kms.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect" style="float: right;">Submit</button>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--First Time-->
    <div class="modal fade" id="firstTime" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="firstTime">General Instructions</h4>
                </div>
                <div class="modal-body">
                    <h4>Greetings from PICT</h4>
                    <p>All students who are willing to seek accomodation in college hostel are requested to <strong>fill up this form</strong> and then <strong>head to the respective hostels</strong> to book the room. <strong>The room number will be alloted by the warden.</strong></p>
                    <strong><p style="color:red;">Students will be provided accomodation only if their place of residence is atleast 40kms from college.</p></strong>
                    <h4>Welcome aboard!</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Core Js -->
    <script src=" plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src=" plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src=" plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src=" plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src=" plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src=" plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src=" plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Sweetalert Plugin Js -->
    <script src=" plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src=" js/admin.js"></script>
    <script src=" js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src=" js/demo.js"></script>

     <script type="text/javascript">
        $(window).on('load', function(){
                $('#firstTime').modal('show');
            });
        $(document).ready(function(){
            $(".required").after("<span style='color:red;'> *</span>");
			$("#stud_name_input").oninvalid = function(event) {
				event.target.setCustomValidity('Name must consist only of alphabets and the special dot character(.)');
            }
			$("#stud_name_input").oninput = function(event) {
				event.target.setCustomValidity('');
            }
			$("#stud_dob_input").oninvalid = function(event) {
				event.target.setCustomValidity('This field is required to be filled in');
            }
			$("#stud_dob_input").oninput = function(event) {
				event.target.setCustomValidity('');
            }
			$("#stud_mis_input").oninvalid = function(event) {
				event.target.setCustomValidity('MIS can contain only alphanumeric characters and have a length of 11 or 12 characters');
            }
			$("#stud_mis_input").oninput = function(event) {
				event.target.setCustomValidity('');
            }
			$("#stud_email_input").oninvalid = function(event) {
				event.target.setCustomValidity('Please enter a valid email address');
            }
			$("#stud_email_input").oninput = function(event) {
				event.target.setCustomValidity('');
            }
			$("#stud_contact_input").oninvalid = function(event) {
				event.target.setCustomValidity('Please enter a valid 10 digit Indian mobile number');
            }
			$("#stud_contact_input").oninput = function(event) {
				event.target.setCustomValidity('');
            }
			$("#stud_receipt_input").oninvalid = function(event) {
				event.target.setCustomValidity('Please enter a valid hostel receipt number');
            }
			$("#stud_receipt_input").oninput = function(event) {
				event.target.setCustomValidity('');
            }
			$("#amt_paid_input").oninvalid = function(event) {
				event.target.setCustomValidity('Please enter the correct amount paid for the hostel');
            }
			$("#amt_paid_input").oninput = function(event) {
				event.target.setCustomValidity('');
            }
			$("#stud_city_input").oninvalid = function(event) {
				event.target.setCustomValidity('This field is required');
            }
			$("#stud_city_input").oninput = function(event) {
				event.target.setCustomValidity('');
            }
        });
    </script>
</body>

</html>