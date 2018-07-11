<?php
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
            $brand = test_input($_POST["brand"]);
            $reg_id = test_input($_POST["reg_id"]);
            $driving_license = test_input($_POST["driving_license"]);
            $license_issue = convertDate(test_input($_POST["license_issue"]));
            $license_validity = convertDate(test_input($_POST["license_validity"]));
            $insurance_comp = test_input($_POST["insurance_comp"]);
            $insurance_policy = test_input($_POST["insurance_policy"]);
            $policy_issue = convertDate(test_input($_POST["policy_issue"]));
            $policy_validity = convertDate(test_input($_POST["policy_validity"]));
            $mis = test_input($_SESSION["user"]);
            $insert = "INSERT INTO `Vehicle_Record`(`Brand`, `Registration_No`, `Driving_License_No`, `License_Issue_Date`, `License_Validity`, `Insurance_Company`, `Insurance_Policy_No`, `Insurance_Policy_Date`, `Insurance_Validity`) VALUES (?,?,?,?,'".$license_issue."','".$license_validity."',?,?,'".$policy_issue."','".$policy_validity."');";
            if(!($insert = $mysqli->prepare($insert)))
            {
                error_log('Prepare failed for vehicle registration in vehicle_registration.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!$insert->bind_param('sssss',$brand,$reg_id,$driving_license,$insurance_comp,$insurance_comp))
            {
                error_log('Bind param failed for vehicle registration in vehicle_registration.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!$insert->execute())
            {
                error_log('Execution failed for vehicle registration in vehicle_registration.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            echo "<script>swal({
                title: 'Done!',
                text: 'Vehicle registration completed.',
                type: 'success'
            })</script>";
        }
    }
    function validateInput()
    {
        
    }
?>
<!DOCTYPE html>
<html>
    <script>
        window.onload = function() {
            document.getElementById("menu_vehicle").classList.add("active");
        }
    </script>
<body>
		
	<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <div class="header">
                                <h2>Vehicle Registration Form</h2>
                            </div>
                            <br>
                            <form method="POST" action="">
                                <div class="row clearfix">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label class="required" for="brand">Brand</label>
                                                <input type="text" id="brand" name="brand" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label class="required" for="reg_id">Registration Number</label>
                                                <input type="text" pattern="[A-Z]{2}[0-9]{1,2}[A-Z]{1,2}[0-9]{1,4}" id="reg_id" name="reg_id" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label class="required" for="driving_license">Driving License Number</label>
                                                <input type="text" pattern="[0-9A-Z]{15}" id="driving_license" name="driving_license" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <label class="required" for="license_issue">License Issue Date</label>
                                                        <input type="text" id="license_issue" name="license_issue" class="datepicker form-control" placeholder="Pick a date" />  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <label class="required" for="license_validity">License Validity</label>
                                                        <input type="text" id="license_validity" name="license_validity" class="datepicker form-control" placeholder="Pick a date" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label class="required" for="insurance_comp">Insurance Company</label>
                                                <input type="text" id="insurance_comp" name="insurance_comp" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label class="required" for="insurance_policy">Insurance Policy Number</label>
                                                <input type="text" id="insurance_policy" name="insurance_policy" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <label class="required" for="policy_issue">Policy Issue Date</label>
                                                    <input type="text" id="policy_issue" name="policy_issue" class="datepicker form-control" placeholder="Pick a date" /> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <label class="required" for="policy_validity">License Validity</label>
                                                    <input type="text" id="policy_validity" name="policy_validity" class="timepicker form-control" placeholder="Pick a time" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" style="float: right;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
