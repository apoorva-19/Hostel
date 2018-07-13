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
            $date = test_input($_POST["date"]);
            $blood_grp = test_input($_POST["blood_grp"]);
            $height = test_input($_POST["height"]);
            $weight = convertDate(test_input($_POST["weight"]));
            $allergies = convertDate(test_input($_POST["allergies"]));
            $family_physician = test_input($_POST["family_physician"]);
            $dr_contact = test_input($_POST["dr_contact"]);
            $mis = test_input($_SESSION["user"]);
            $insert = "INSERT INTO `Medical`(`Date_Checkup`, `Height`, `Weight`, `Blood_Group`, `Allergies`,`Dr_Contact`,`Family_Physician`,`MIS`) VALUES ('".$date."',?,?,?,?,?);";
            if(!($insert = $mysqli->prepare($insert)))
            {
                //error_log('Prepare failed for vehicle registration in vehicle_registration.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!$insert->bind_param('iisssss',$height,$weight,$allergies,$blood_grp,$allergies,$dr_contact,$family_physician))
            {
                //error_log('Bind param failed for medical form in medical.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                })</script>";
                exit;
            }
            if(!$insert->execute())
            {
                //error_log('Execution failed for medical form in medical.php: ('.$mysqli->errno.') '.$mysqli->error);
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
    function validateInput()
    {
        
    }
?>
<!DOCTYPE html>
<html>
    <script>
        window.onload = function() {
            document.getElementById("menu_medical").classList.add("active");
        }
    </script>
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Medical Information Form</h2>
                            </div>
                            <form method="POST" action="#">
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="date">Date</label>
                                                    <input type="text" id="date" class="datepicker form-control" placeholder="dd/mm/yy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="">
                                                    <label class="required" for="blood_grp">Blood Group</label>
                                                    <select id="blood_grp">
                                                        <option>A +ve</option>
                                                        <option>A -ve</option>
                                                        <option>B +ve</option>
                                                        <option>B -ve</option>
                                                        <option>AB +ve</option>
                                                        <option>AB -ve</option>
                                                        <option>O +ve</option>
                                                        <option>O -ve</option>
                                                        <option>Unknown</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">    
                                        <div class="col-md-6">        
                                            <div class="form-group">
                                                <div class="form-line">        
                                                    <label class="required" for="height">Height</label>
                                                    <input type ="text" id="height" class = "form-control" placeholder="in feet">
                                                </div>
                                            </div>    
                                        </div>    
                                        <div class="col-md-6">        
                                            <div class="form-group">
                                                <div class="form-line">        
                                                    <label class="required" for="weight">Weight</label>
                                                    <input type ="text" id="weight" class = "form-control" placeholder="in kg" >
                                                </div>    
                                            </div>
                                        </div>    
                                    </div> 
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="allergies">Allergies</label>
                                                    <textarea id="allergies" rows="1" class="form-control no-resize auto-growth" placeholder="Enter your allergies here."></textarea>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="family_physician">Family Physician</label>
                                                    <input type="text" id="family_physician" class="form-control" placeholder="Name of family physician" reqiured>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="dr_contact">Contact Number</label>
                                                    <input type="text" id="dr_contact" class="form-control" placeholder="xxx-xxx-xxxx" reqiured>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;">Submit</button>
                                    <br>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
</html>