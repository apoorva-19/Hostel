<!DOCTYPE html>
<?php

    require_once("base.php");

?>
<html>
<script>
    window.onload = function() {
        document.getElementById("menu_night").classList.add("active");
    }
</script>
<body class="theme-indigo">
    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Night Form</h2><br>
                            <small><b>Important Note:</b><br>
                                1. All Fields of this form are mandatory<br>
                                2. This form is to be submitted at least 1 day before actual date of leave<br>
                                3. This form remains invalid if it is not endorsed by the Warden.
                            </small>
                        </div>
                        <div class="body">
                            <form action="/" id="night_form" method="post">
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
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label class="required" for="contact_name">Contact Person's Name</label>
                                                <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label class="required" for="contact_number">Parent's Contact Number</label>
                                                <input type="text" id="contact_number" name="contact_number" class="form-control" placeholder="xxxxxxxxxx">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label class="required" for="address">Address</label>
                                                <textarea id="guardian_address" rows="1" class="form-control no-resize auto-growth" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>

</html>
