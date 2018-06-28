<?php
    require_once('base.php');
?>

<!DOCTYPE html>
<html>
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
                                                    <label for="date">Date</label>
                                                    <input type="text" id="date" class="datepicker form-control" placeholder="dd/mm/yy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="">
                                                    <label for="blood_grp">Blood Group</label>
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
                                                    <label for="height">Height</label>
                                                    <input type ="text" id="height" class = "form-control" placeholder="in feet">
                                                </div>
                                            </div>    
                                        </div>    
                                        <div class="col-md-6">        
                                            <div class="form-group">
                                                <div class="form-line">        
                                                    <label for="weight">Weight</label>
                                                    <input type ="text" id="weight" class = "form-control" placeholder="in kg" >
                                                </div>    
                                            </div>
                                        </div>    
                                    </div> 
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="allergies">Allergies</label>
                                                    <textarea id="allergies" rows="1" class="form-control no-resize auto-growth" placeholder="Enter your allergies here."></textarea>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="family_physician">Family Physician</label>
                                                    <input type="text" id="family_physician" class="form-control" placeholder="Name of family physician" reqiured>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="dr_contact">Contact Number</label>
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