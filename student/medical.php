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
                                <h2>Medical Information</h2>
                            </div>
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
                                </div> 
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group container">
                                            <div class="form-line">
                                                <label for="allergies">Allergies</label>
                                                <textarea id="allergies" rows="1" class="form-control no-resize auto-growth" placeholder="Enter your allergies here."></textarea>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>