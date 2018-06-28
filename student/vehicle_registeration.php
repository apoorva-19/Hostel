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
                        <div class="body table-responsive">
                            <div class="header">
                                <h2>Vehicle Registeration Form</h2>
                            </div>
                            <br>
                            <form method="POST" action="#">
                                <div class="row clearfix">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="brand">Brand</label>
                                                <input type="text" id="brand" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="reg_id">Registeration Number</label>
                                                <input type="text" id="reg_id" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="driving_license">Driving License Number</label>
                                                <input type="text" id="driving_license" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">date_range</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <label for="license_issue">License Issue Date</label>
                                                        <input type="text" id="reg_id" class="datepicker form-control" placeholder="Pick a date" /> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">date_range</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <label for="license_validity">License Validity</label>
                                                        <input type="text" id="license_validity" class="timepicker form-control" placeholder="Pick a time" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="insurance_comp">Insurance Company</label>
                                                    <input type="text" id="insurance_comp" class="form-control" placeholder="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="insurance_policy">Insurance Policy Number</label>
                                                    <input type="text" id="insurance_policy" class="form-control" placeholder="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">date_range</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <label for="policy_issue">Policy Issue Date</label>
                                                            <input type="text" id="policy_issue" class="datepicker form-control" placeholder="Pick a date" /> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">date_range</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <label for="policy_validity">License Validity</label>
                                                            <input type="text" id="policy_validity" class="timepicker form-control" placeholder="Pick a time" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
