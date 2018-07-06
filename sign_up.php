<?php
/*
    TODO:
    1. HTTP restriction for Places API - http://hostel.pictinc.org/*
    2. HTTP restriction for Distance Matrix API - http://hostel.pictinc.org/*
    3. Need to add validation for receipt number and amount paid
    4. Check if country is not India. If not, distance checking is not required and sign up can be done directly.
*/
    $GLOBALS["visit"] = false;
    require_once("convert.php");
    require_once("connect.php");
    echo '<script src=" plugins/jquery/jquery.min.js"></script>';
    echo '<script src=" plugins/jquery-validation/jquery.validate.js"></script>';
    echo '<link href=" plugins/sweetalert/sweetalert.css" rel="stylesheet" />';
    echo '<script src=" plugins/sweetalert/sweetalert.min.js"></script>';
    echo '<style>
    .bootstrap-select.swal2-select{
        display:none !important;
    }</style>';
    if(($_SERVER["REQUEST_METHOD"] == "POST"))
    {
        $GLOBALS["visit"] = true;
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
            if(test_input($_POST["country"]) == "India")
                $distanceResult = validateDistance(test_input($_POST["lat"]), test_input($_POST["lng"]));
            else
                $distanceResult = 1;

            if($distanceResult == 0)
            {
                echo '<script>$(document).ready(function(){
                    swal({
                        title: "Error",
                        text: "Your city of residence is less than 40 kms from college. Hostel allocation is only for students who live more than 40 kms from college. Please contact the administration office for further details",
                        type: "error"
                        });
                        $(".btn-group.bootstrap-select.swal2-select").toggle(false);
                });</script>';
            }
            else if($distanceResult == 2)
            {
                echo "<script>$(document).ready(function(){
                    swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                    });
                    $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                });</script>";
            }
            else if($distanceResult == 3)
            {
                echo "<script>$(document).ready(function(){swal({
                    title: 'Error',
                    text: 'We could not find the distance to the specified location. Please select another landmark near your permanent residence from our list of suggestions. We are extremely sorry for the inconvenience.',
                    type: 'error',
                    });
                    $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                });</script>";
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
                $modeTrans = test_input($_POST["mode_trans"]);
                $street = test_input($_POST["route"]);
                $city = test_input($_POST["locality"]);
                $state = test_input($_POST["administrative_area_level_1"]);
                $zipcode = test_input($_POST["postal_code"]);
                $country = test_input($_POST["country"]);
                $date = date('Y-m-d');

                $sql = "SELECT `MIS` FROM `New_Registrations` WHERE `MIS` = ?;";
                if(!($verify_mis = $mysqli->prepare($sql)))
                {
                    error_log('Prepare failed for mis checking in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                    echo "<script>$(document).ready(function(){
                        swal({
                        title: 'Error',
                        text: 'Request could not be processed. We are trying to fix the error.',
                        type: 'error'
                        });
                        $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                    });</script>";
                }
                else
                {
                    if(!($verify_mis->bind_param('s', $mis)))
                    {
                        error_log('Binding failed for mis checking in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                        echo "<script>$(document).ready(function(){
                            swal({
                            title: 'Error',
                            text: 'Request could not be processed. We are trying to fix the error.',
                            type: 'error'
                            });
                            $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                        })</script>";
                    }
                    else
                    {
                        if(!$verify_mis->execute())
                        {
                            error_log('Execution failed for verifying student in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                            echo "<script>$(document).ready(function(){
                                swal({
                                title: 'Error',
                                text: 'Request could not be processed. We are trying to fix the error.',
                                type: 'error'
                                });
                                $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                            })</script>";
                        }
                        else
                        {
                            $res = $verify_mis->get_result();
                            if($res->num_rows > 0)
                            {
                                echo "<script>$(document).ready(function(){
                                    swal({
                                    title: 'Error',
                                    text: 'This MIS id has already registered for the hostel',
                                    type: 'error'
                                    });
                                    $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                                })</script>";
                            }
                            else
                            {
                                $sql = "INSERT INTO `New_Registrations`(`Name`, `Gender`, `Admission_Type`, `DOB`, `MIS`, `Email_Id`, `Contact_Number`, `Branch`, `Year`, `Receipt_No`, `Amount_Paid`, `Mode_Transaction`, `Street`, `City`, `State`, `Pincode`, `Country`, `Reg_Date`) VAlUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

                                if(!($insert_stud = $mysqli->prepare($sql)))
                                {
                                    error_log('Prepare failed for insertion of student in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                                    echo "<script>$(document).ready(function(){
                                        swal({
                                        title: 'Error',
                                        text: 'Request could not be processed. We are trying to fix the error.',
                                        type: 'error'
                                        });
                                        $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                                    })</script>";
                                }
                                else
                                {
                                    if(!($insert_stud->bind_param('ssssssisisiissssss', $name, $gender, $admissionType, $dob, $mis, $email, $contact, $branch, $year, $receipt, $amtPaid, $modeTrans, $street, $city, $state, $zipcode, $country, $date)))
                                    {
                                        error_log('Binding failed for insertion of student in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                                        echo "<script>$(document).ready(function(){
                                            swal({
                                            title: 'Error',
                                            text: 'Request could not be processed. We are trying to fix the error.',
                                            type: 'error'
                                            });
                                            $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                                        })</script>";
                                    }
                                    else
                                    {
                                        if(!$insert_stud->execute())
                                        {
                                            error_log('Execution failed for insertion of student in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                                            echo "<script>$(document).ready(function(){swal({
                                                title: 'Error',
                                                text: 'Request could not be processed. We are trying to fix the error.',
                                                type: 'error'
                                                });
                                                $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                                            })</script>";
                                        }
                                        else
                                        {
                                            if(!$result = $insert_stud->get_result() && $mysqli->errno == 0)
                                                echo "<script>$(document).ready(function(){
                                                        swal({
                                                        title: 'Success',
                                                        text: 'Sign up completed successfully!',
                                                        type: 'success'
                                                    });
                                                    $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                                                });</script>";
                                            else
                                            {
                                                error_log('PHP code executed but MySQL query failed. Please check the query or MySQL database for errors in sign_up.php: ('.$mysqli->errno.')'.$mysqli->error);
                                                echo "<script>$(document).ready(function(){
                                                    swal({
                                                        title: 'Error',
                                                        text: 'Request could not be processed. We are trying to fix the error.',
                                                        type: 'error'
                                                    });
                                                    $('.btn-group.bootstrap-select.swal2-select').toggle(false);
                                                });</script>";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }    
            }
        }
    }
    function validateSignUpInput()
    {
        $valid = true;
        if(!(isset($_POST["stud_name"]) && !(empty(trim($_POST["stud_name"]))) && preg_match('/^[a-zA-Z\s]{1,}[\.]{0,1}[a-zA-Z\s]{0,}$/',$_POST["stud_name"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_name').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_name' : 'Name can consist only of alphabets and the special dot character (.)' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_dob"]) && !(empty(trim($_POST["stud_dob"]))) && preg_match("/[a-zA-Z0-9\s]{1,}/", $_POST["stud_dob"])))
        {         
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_dob').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_dob' : 'Please enter a valid date of birth' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_mis"]) && !(empty(trim($_POST["stud_mis"]))) && preg_match("/[A-Z0-9]{11,12}/", $_POST["stud_mis"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_mis').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_mis' : 'Please enter a valid MIS ID consisting of 11 or 12 alphanumeric characters' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_email"]) && !(empty(trim($_POST["stud_email"]))) && filter_input(INPUT_POST, "stud_email", FILTER_VALIDATE_EMAIL)))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_email').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_email' : 'Please enter a valid email address' }) }, 100);
            });</script>";
            
        }
        if(!(isset($_POST["stud_contact"]) && !(empty(trim($_POST["stud_contact"]))) && preg_match('/^[6789]{1}[0-9]{9}/', $_POST["stud_contact"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_contact').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_contact' : 'Please enter a valid contact number' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_branch"]) && !(empty(trim($_POST["stud_branch"]))) && preg_match('/^CE$|^IT$|^EnTC$/', $_POST["stud_branch"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_branch').className += ' form-line focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_branch' : 'Please select a valid branch' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_year"]) && !(empty(trim($_POST["stud_year"]))) && preg_match('/[1-3]{1}/', $_POST["stud_year"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_year').className += ' form-line focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_year' : 'Please select a valid year of engineering' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_gender"]) && !(empty(trim($_POST["stud_gender"]))) && preg_match('/^F{1}|^M{1}|^O{1}/', $_POST["stud_gender"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_gender').className += ' form-line focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_gender' : 'Please select a valid gender' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["admission_type"]) && !(empty(trim($_POST["admission_type"]))) && preg_match('/^M{1}|^C{1}|^O{1}/', $_POST["admission_type"])))
        {
			$valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('admission_type').className += ' form-line focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'admission_type' : 'Please select a valid admission type' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["mode_trans"]) && !(empty(trim($_POST["mode_trans"]))) && preg_match('/^1{1}|^2{1}/', $_POST["mode_trans"])))
        {
            $valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('mode_trans').className += ' form-line focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'mode_trans' : 'Please select a valid transaction type' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["amt_paid"]) && !(empty(trim($_POST["amt_paid"]))) && is_numeric($_POST["amt_paid"])))
        {
            $valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('amt_paid').className +=' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'amt_paid' : 'Please enter a valid amount' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["stud_receipt"]) && !(empty(trim($_POST["stud_receipt"]))) && is_numeric($_POST["stud_receipt"])))
        {
            $valid = false;
            echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('stud_receipt').className += ' focused error'; });</script>";
            echo "<script>$(document).ready(function() {
                setTimeout(function() { $('form').validate().showErrors({ 'stud_receipt' : 'Please enter a valid receipt number' }) }, 100);
            });</script>";
        }
        if(!(isset($_POST["lat"]) && !(empty(trim($_POST["lat"])))))
        {
            $valid = false;            
        }
        if(!(isset($_POST["lng"]) && !(empty(trim($_POST["lng"])))))
        {
            $valid = false;            
        }
        return $valid;
    }

    function validateDistance($lat, $lng)
    {
        /*
            NOTE: In this function, the following return values carry the following meaning:
            0 - The API request was processed successfully and it was determined that the user lives at a distance of less than 40 kms.
            1 - The API request was processed successfully and it was determined that the user lives at a distance of greater than or equal        to 40 kms.
            2 - The API request returned an error in the TOP LEVEL STATUS CODE. this could have the following meanings:
                - INVALID_REQUEST indicates that the provided request was invalid
                - MAX_ELEMENTS_EXCEEDED indicates that the product of origins and destinations exceeds the per-query limit.
                - OVER_DAILY_LIMIT indicates any of the following:
                        The API key is missing or invalid.
                        Billing has not been enabled on your account.
                        A self-imposed usage cap has been exceeded.
                        The provided method of payment is no longer valid (for example, a credit card has expired).
                - OVER_QUERY_LIMIT indicates the service has received too many requests from your application within the allowed time            period.
                - REQUEST_DENIED indicates that the service denied use of the Distance Matrix service by your application.
                - UNKNOWN_ERROR indicates a Distance Matrix request could not be processed due to a server error. The request may succeed        if you try again
            3 - The API request returned an error in the ELEMENT LEVEL STATUS CODE. This could have the following meanings:
                - NOT_FOUND indicates that the origin and/or destination of this pairing could not be geocoded.
                - ZERO_RESULTS indicates no route could be found between the origin and destination.
                - MAX_ROUTE_LENGTH_EXCEEDED indicates the requested route is too long and cannot be processed.
        */

        // $urlEncodedStreet = urlencode($street);
        $urlEncodedLocation = $lat.",".$lng;
        error_log($urlEncodedLocation);
        $googleMapsUrl = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=18.4575,73.8508&destinations=$urlEncodedLocation&key=AIzaSyBaW6EE3ERJBT_RmUjL_lGhh3IdvdabxrM&language=en";
        $data = file_get_contents($googleMapsUrl);
        $data = json_decode($data);
        if($data->status == "OK")
        {
            $distance = 0;
            foreach($data->rows[0]->elements as $road) {
                if($road->status == "OK")
                {
                    $distance += $road->distance->text;
                    $distance = (float)$distance;
                    error_log('Debug print: Distance = '.$distance);
                    if($distance < 40.0)
                        return 0;   
                    return 1;
                }
                else
                {
                    error_log('Google Distance Matrix API Error was encountered. The element level status code returned the error '.$road->status.'. This error was encountered in the data element retrieved inside validateDistance() in sign_up.php. This error does not have a server side fix and possible actions need to be suggested to the user to rectify this.');
                    return 3;
                }
            }
        }
        else
        {
            error_log('Google Distance Matrix API Error was encountered. The top level status code returned the error '.$data->status.'. This error was encountered in the validateDistance() in sign_up.php. This error will have to be analyzed and fixed for sign up of users to proceed smoothly henceforth.');
            return 2;
        }
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
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
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
                        <b><h2>Registration for Students</h2></b>
                    </div>
                    <div class="body">
                        <form method="POST" action="" id="signUpForm" onsubmit="return debugFunction();">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="stud_name">
                                            <label class="required" for="stud_name">Student's Name</label>
                                            <input type="text" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" class="form-control" name="stud_name" id="stud_name_input" oninvalid="this.setCustomValidity('Name must consist only of alphabets and the special dot character(.)');" onchange="this.setCustomValidity('');" required>
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
                                                <option value="P">PIO</option>
                                                <option value="C">CIWGC</option>
                                                <option value="JK">Jammu and Kashmir</option>
                                                <option value="DSE">Direct Second Year</option>
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
                                            <input type="text" pattern="[A-Z0-9]{11,12}" placeholder="MIS Login" class="form-control" name="stud_mis" id="stud_mis_input" oninvalid = "this.setCustomValidity('MIS can contain only alphanumeric characters and have a length of 11 or 12 characters');" onchange="this.setCustomValidity('');" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="stud_email">
                                            <label class="required" for="stud_email">Email Id</label>
                                            <input type="email" placeholder="Email address" class="form-control" name="stud_email" oninvalid="this.setCustomValidity('Please enter a valid email address');" onchange="this.setCustomValidity('');" id="stud_email_input" oninput="this.setCustomValidity('');" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="stud_contact">
                                            <label class="required" for="stud_contact">Contact Number</label>
                                            <input type="text" pattern="[6789]{1}[0-9]{9}" placeholder="10 digit Indian mobile number" class="form-control" name="stud_contact" id="stud_contact_input" oninvalid="this.setCustomValidity('Please enter a valid 10 digit Indian mobile number');" onchange="this.setCustomValidity('');" oninput="this.setCustomValidity('');" required>
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
                                                <option value="CE">Computer Enginnering</option>
                                                <option value="IT">Information Technology</option>
                                                <option value="EnTC">Electronics and Telecommunication</option>
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
                                            <label class="required" for="stud_receipt">Hostel fee receipt number/UTR number</label>
                                            <input type="text" class=" form-control" placeholder="Receipt Number for Hostel Reservation" name="stud_receipt" id="stud_receipt_input" oninvalid="this.setCustomValidity('Please enter a valid hostel receipt number');" onchange="this.setCustomValidity('');" oninput="this.setCustomValidity('');" pattern="^[0-9]\d*$" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="amt_paid">
                                            <label class="required" for="amt_paid">Amount Paid for Hostel Reservation</label>
                                            <input type="number" placeholder="100000" class="form-control" name="amt_paid" id="amt_paid_input" pattern="^(?!0*[.,]0*$|[.,]0*$|0*$)\d+[,.]?\d{0,2}$" oninvalid="this.setCustomValidity('Please enter the correct amount paid for the hostel');" onchange="this.setCustomValidity('');" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="selectDiv" id="mode_trans">
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
                                        <div class="form-line inputDiv" id="stud_locality">
                                            <label class="required" for="stud_locality">Permanent Address/Nearest landmark to permanent address</label>
                                            <input id="stud_locality_input" name="stud_locality" placeholder="Enter the street name or the nearest landmark to your permanent address." type="text" class="form-control" onfocus="initAutoComplete();" required/>
                                            <div class="help-info">
                                                Hostel will be alloted to those students whose permanent address is at a distance of more than 40 kms.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="route_div">
                                            <label class="" for="route">Street/Landmark/Locality</label>
                                            <input id="route" name="route" class="form-control" readonly style="background-color:#efefef;" type="text" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="locality_div">
                                            <label class="" for="locality">City</label>
                                            <input id="locality" name="locality" class="form-control" readonly style="background-color:#efefef;" type="text" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="administrative_area_level_1_div">
                                            <label class="" for="administrative_area_level_1">State</label>
                                            <input id="administrative_area_level_1" name="administrative_area_level_1" class="form-control" readonly style="background-color:#efefef;" type="text" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="postal_code_div">
                                            <label class="" for="postal_code">Pin Code</label>
                                            <input id="postal_code" name="postal_code" class="form-control" readonly style="background-color:#efefef;" type="text" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line inputDiv" id="country_div">
                                            <label class="" for="country">Country</label>
                                            <input id="country" name="country" class="form-control" readonly style="background-color:#efefef;" type="text" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="completeAddress" id="completeAddress" readonly required/>
                            <input type="hidden" name="lat" id="lat" readonly required>
                            <input type="hidden" name="lng" id="lng" readonly required>
                            <button type="submit" class="btn btn-primary waves-effect" style="float: right;">Submit</button>
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
                    <h4>Greetings from PICT...!</h4>
                    <p>All students who are willing to seek accomodation in college hostel are requested to <strong>fill up this form</strong> and then <strong>head to the respective hostels</strong> to book the room. <strong>The room number will be alloted by the warden.</strong></p>
                    <strong><p style="color:red;">Students will be provided accomodation only if their place of residence is atleast 40kms from college.</p></strong>
                    <h4>Before registering make sure you have the following:</h4>
                    <ul>
                        <li>Registration Number (MIS Id)</li>
                        <li>Receipt Number/UTR Number for hostel fees</li>
                    </ul>
                    <br>
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

    <!-- Custom Js -->
    <script src=" js/admin.js"></script>
    <script src=" js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src=" js/demo.js"></script>

    <!-- Google Places API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaW6EE3ERJBT_RmUjL_lGhh3IdvdabxrM&libraries=places" async defer></script>

    <script type="text/javascript">
        <?php 
            if(isset($GLOBALS["visit"]))
            {
                if(!$GLOBALS["visit"])
                {
                    echo "$(window).on('load', function() {
                        $('#firstTime').modal('show');
                    });";
                    $GLOBALS["visit"] = true;
                }
            }
        ?>
        $(document).ready(function() {
            $(".required").after("<span style='color:red;'> *</span>");
        });

        var placeSearch, autocomplete, completeAddress = "";
        var componentForm = {
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'long_name',
            postal_code: 'short_name',
            country: 'long_name'

        };

        function initAutoComplete() {
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('stud_locality_input')),
                {types: ['geocode']});
            
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            var place = autocomplete.getPlace();
            for(var component in componentForm) {
                document.getElementById(component).value = '';
            }

            for(var i=0; i<place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if(componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                    completeAddress = completeAddress.concat(val.toString());
                }
            }
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('lng').value = place.geometry.location.lng();
            document.getElementById('completeAddress').value = completeAddress;
        }
    </script>
</body>

</html>