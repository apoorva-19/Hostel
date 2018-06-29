<!DOCTYPE html>
<?php

    require_once("base.php");

?>
<html>
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
                                        <h2 class="card-inside-title">Student Name</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="stud_name" placeholder="Type here..." required> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <h2 class="card-inside-title">Room Number</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="room_no" placeholder="Type here..." required minlength="4" maxlength="4">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <h2 class="card-inside-title">Out Time</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="datetimepicker form-control" placeholder="Pick Date and Time...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <h2 class="card-inside-title">In Time</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="datetimepicker form-control" placeholder="Pick Date and Time...">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                        <h2 class="card-inside-title">Address</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" placeholder="Type here..."></textarea>
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
