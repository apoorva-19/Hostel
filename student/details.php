<?php
    require_once('base.php');
?>
<!DOCTYPE html>
<html>
    <script>
        window.onload = function() {
            document.getElementById("menu_details").classList.add("active");
        }
    </script>

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
                            <form id="wizard_with_validation" method="POST" action="">
                                <h3>Personal Details</h3>
                                <fieldset>
                                    <div class="row clearfix">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="father_name">Father's Name</label>
                                                    <input type="text" id="father_name" name="father_name" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" class="required" for="mother_name">Mother's Name</label>
                                                    <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="f_occupation">Father's Occupation</label>
                                                    <input type="text" id="f_occupation" name="f_occupation" class="form-control" placeholder="" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="m_occupation">Mother's Occupation</label>
                                                    <input type="text" id="m_occupation" name="m_occupation" class="form-control" placeholder="" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="f_designation">Father's Designation</label>
                                                    <input type="text" id="f_designation" name="f_designation" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="m_designation">Mother's Designation</label>
                                                    <input type="text" id="m_designation" name="m_designation" class="form-control" placeholder="" required/>
                                                    <div class="help-info">Enter None if unemployed</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="f_mob_no">Father's Contact Number</label>
                                                    <input type="text" id="f_mob_no" name="f_mob_no" class="form-control" placeholder="" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="m_mob_no">Mother's Contact Number</label>
                                                    <input type="text" id="m_mob_no" name="m_mob_no" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="f_email">Father's Email Id</label>
                                                    <input type="email" id="f_email" name="f_email" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="m_email">Mother's Email Id</label>
                                                    <input type="email" id="m_email" name="m_email" class="form-control" placeholder="" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="perm_add">Permanent Address</label>
                                                    <textarea id="perm_add" name="perm_add" rows="1" class="form-control no-resize auto-growth" placeholder="" required></textarea>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="dz-message">
                                                    <label class="required" for="photo">Photo</label>
                                                    <div class="drag-icon-cph">
                                                        <i class="material-icons">touch_app</i>
                                                        <span>Upload candidate's photo</span>
                                                    </div>
                                                </div>
                                                <div class="fallback">
                                                    <input id="photo" name="photo" type="file" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <h3>Guardian Details</h3>
                                <fieldset>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="local_guardian">Local Guardian's Name</label>
                                                    <input type="text" id="local_guardian" name="local_guardian" placeholder="Name" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="relation">Relation with Guardian</label>
                                                    <input type="text" id="relation" name="relation" placeholder="Relation" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="guardian_add">Guardian's Address</label>
                                                    <textarea id="guardian_add" name="guardian_add" rows="1" class="form-control no-resize auto-growth" placeholder="" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="required" for="g_contact">Guardian's Contact</label>
                                                    <input type="text" id="g_contact" name="g_contact" placeholder="Contact number" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label class="" for="alt_g_contact">Guardian's Contact (Alternate)</label>
                                                    <input type="text" id="alt_g_contact" name="alt_g_contact" placeholder="Contact number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
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