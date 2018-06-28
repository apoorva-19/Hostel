<?php
    require_once('base.php');
?>
<!DOCTYPE html>
<html>


<body>
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Example | Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Basic Details</h2>
                        </div>
                        <div class="body">
                            <div id="wizard_horizontal">
                                <h2>Personal Details</h2>
                                <section>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <div class="body table-responsive">
                                                    <form method="POST" action="#">
                                                        <div class="row clearfix">
                                                            <div class="col-sm-12 col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="father's_name">Father's Name</label>
                                                                        <input type="text" id="father's_name" class="form-control" placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="mother's_name">Mother's Name</label>
                                                                        <input type="text" id="mother's_name" class="form-control" placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="f_occupation">Father's Occupation</label>
                                                                        <input type="text" id="f_occupation" class="form-control" placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="m_occupation">Mother's Occupation</label>
                                                                        <input type="text" id="m_occupation" class="form-control" placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="f_designation">Father's Designation</label>
                                                                        <input type="text" id="m_designation" class="form-control" placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="m_designation">Mother's Designation</label>
                                                                        <input type="text" id="m_designation" class="form-control" placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="f_mob_no">Father's Contact Number</label>
                                                                        <input type="text" id="f_mob_no" class="form-control" placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="m_mob_no">Mother's Contact Number</label>
                                                                        <input type="text" id="m_mob_no" class="form-control" placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="f_email">Father's Email Id</label>
                                                                        <input type="email" id="f_email" class="form-control" placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="m_email">Mother's Email Id</label>
                                                                        <input type="email" id="m_email" class="form-control" placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="perm_add">Permanent Address</label>
                                                                        <textarea id="perm_add" rows="1" class="form-control no-resize auto-growth" placeholder=""></textarea>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="dz-message">
                                                                        <div class="drag-icon-cph">
                                                                            <i class="material-icons">touch_app</i>
                                                                            <span>Choose a picture</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="fallback">
                                                                        <input name="file" type="file" multiple />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h2>Guardian Details</h2>
                                <section>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <div class="body table-responsive">
                                                    <form method="POST" action="#">
                                                        <div class="row clearfix">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="local_guardian">Local Guardian's Name</label>
                                                                        <input type="text" id="local_guardian" placeholder="Name" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="relation">Relation with Guardian</label>
                                                                        <input type="text" id="relation" placeholder="Relation" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="guardian_address">Guardian's Address</label>
                                                                        <textarea id="guardian_address" rows="1" class="form-control no-resize auto-growth" placeholder="Enter your allergies here."></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="g_contact">Guardian's Contact</label>
                                                                        <input type="text" id="g_contact" placeholder="Contact number" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <label for="alt_g_contact">Guardian's Contact (Alternate)</label>
                                                                        <input type="text" id="alt_g_contact" placeholder="Contact number" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Validation Plugin Css -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="../plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/pages/forms/form-wizard.js"></script>

</body>
</html>