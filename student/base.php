<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="../plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
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
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">PICT Hostel</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- LOGOUT BUTTON HERE -->
                    <!-- <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lorem Ipsum</div>
                    <div class="email">loremipsum@doloramet.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li id="menu_home">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li id="menu_details">
                        <a href="details.php">
                            <i class="material-icons">subject</i>
                            <span>Details</span>
                        </a>
                    </li>
                    <li id="menu_profile">
                        <a href="profile.php">
                            <i class="material-icons">person</i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li id="menu_vehicle">
                        <a href="vehicle_registeration.php">
                            <i class="material-icons">assignment</i>
                            <span>Vehicle Registeration Form</span>
                        </a>
                    </li>
                    <li id="menu_night">
                        <a href="night.php">
                            <i class="material-icons">assignment</i>
                            <span>Night Out Form</span>
                        </a>
                    </li>
                    <li id="menu_checklist">
                        <a href="checklist.php">
                            <i class="material-icons">assignment</i>
                            <span>Room Amenities</span>
                        </a>
                    </li>
                    <li id="menu_medical">
                        <a href="medical.php">
                            <i class="material-icons">assignment</i>
                            <span>Medical Information Form</span>
                        </a>
                    </li>
                    <li id="menu_suggestions">
                        <a data-toggle="modal" data-target="#suggestion">
                            <i class="material-icons">insert_comment</i>
                            <span>Suggestions</span>
                        </a>
                    </li>
                    <li id="menu_complaints">
                        <a data-toggle="modal" data-target="#complaint">
                            <i class="material-icons">thumb_down</i>
                            <span>Complaints</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 - 2019 <a href="javascript:void(0);">Team Foobar</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
    <div class="modal fade" id="suggestion" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="suggestionLabel">Suggestions</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="container form-group">
                                    <div class="form-line">
                                        <label for="category_suggestion">Category</label>
                                        <select id="category_suggestion">
                                            <option value="housekeeping">Housekeeping</option>
                                            <option value="wifi">Wi-Fi</option>
                                            <option value="plumbing">Plumbing</option>
                                            <option value="furniture">Furniture</option>
                                            <option value="electricity">Electricity</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="container form-group">
                                    <div class="form-line">
                                        <label for="suggestion_text">Suggestion</label>
                                        <textarea rows="3" class="form-control" >Add you suggestion here.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="complaint" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="complaintLabel">Complaints</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="container form-group">
                                    <div class="form-line">
                                        <label for="category_complaint">Category</label>
                                        <select id="category_complaint">
                                            <option value="housekeeping">Housekeeping</option>
                                            <option value="wifi">Wi-Fi</option>
                                            <option value="plumbing">Plumbing</option>
                                            <option value="furniture">Furniture</option>
                                            <option value="electricity">Electricity</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="container form-group">
                                    <div class="form-line">
                                        <label for="suggestion_text">Complaint</label>
                                        <textarea rows="3" class="form-control" >Add you complaint here.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../plugins/flot-charts/jquery.flot.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="../plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="../plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>
