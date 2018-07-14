<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

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

    <!-- Sweetalert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

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
                <a class="navbar-brand" href="index.php">SCTR's PICT Hostel</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- LOGOUT BUTTON HERE -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
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
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Girls' Hostel Warden</div>
                    <div class="email"></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../logout.php"><i class="material-icons">input</i>Sign Out</a></li>
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
                    <li id="menu_layout">
                        <a href="room_layout.php">
                            <i class="material-icons">room</i>
                            <span>Room Layout</span>
                        </a>
                    </li>
                    <li id="menu_studentlist_super">
                        <a href="javascript:void(0);" id="menu_student_lists" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Student Lists</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="all_hostelites">
                                <a href="student_list.php">
                                    <i class="material-icons">people</i>
                                    <span>All Hostelites</span>
                                </a>
                            </li>
                            <li id="student_night_out">
                                <a href="student_night_out.php">
                                    <i class="material-icons">people</i>
                                    <span>Night Out</span>
                                </a>
                            </li>
                            <li id="student_late">
                                <a href="student_late.php">
                                    <i class="material-icons">people</i>
                                    <span>Late Record</span>
                                </a>
                            </li>
                            <li id="student_noon">
                                <a href="student_noon.php">
                                    <i class="material-icons">people</i>
                                    <span>Noon Record</span>
                                </a>
                            </li>
                            <li id="student_food">
                                <a href="student_food.php">
                                    <i class="material-icons">people</i>
                                    <span>Meal Record</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#late">
                            <i class="material-icons">report_problem</i>
                            <span>Add Late Entry</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#noon">
                            <i class="material-icons">access_time</i>
                            <span>Add Afternoon Entry</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#room_number">
                            <i class="material-icons">event_seat</i>
                            <span>Change Room Number</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#notice">
                            <i class="material-icons">event_note</i>
                            <span>Add Notices</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#message">
                            <i class="material-icons">message</i>
                            <span>Send Messages</span>
                        </a>
                    </li>
                    <li id="menu_layout">
                        <a href="night.php">
                            <i class="material-icons">room</i>
                            <span>Night Permissions</span>
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
    
    <!-- Late Entry -->
    <div class="modal fade" id="late" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="lateLabel">Late Entry</h4>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="container form-group">
                                <div class="form-line">
                                    <label class="required" for="late_room_no">Room No</label>
                                    <input type="text" id="late_room_no" class="form-control" placeholder="Enter the Room_No" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="container form-group">
                                <div class="form-line">
                                    <label class="required" for="late_time">Time</label>
                                    <input type="text" id="late_time" class="timepicker form-control" placeholder="Enter the time" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                    <div class="col-12">
                        <div class="container form-group">
                            <div class="form-line">
                            <label class="required" for="reason">Reason</label>
                            <textarea id="reason" rows="1" class="form-control no-resize auto-growth" placeholder="" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="submitLate();" class="btn btn-primary waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Noon Entry -->
    <div class="modal fade" id="noon" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="noonLabel">Noon Entry</h4>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="container form-group">
                                <div class="form-line">
                                    <label for="noon_room_no">Room No</label>
                                    <input type="text" id="noon_room_no" class="form-control" placeholder="Enter the Room_No" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="submitNoon();" class="btn btn-primary waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notice" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="noticeLabel">Notice</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <div class="row clearfix">
                            <div class="col-6">
                                <div class="container form-group">
                                    <div class="">
                                        <label for="category">Category</label>
                                        <select id="notice_category" type="category" required>
                                            <option value="choose">choose</option>
                                        </select>
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
                                            <label for="date_from">Date From</label>
                                            <input type="text" id="date_from" required class="datepicker form-control" placeholder="Pick a date" /> 
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
                                            <label for="date_to">Date To</label>
                                            <input type="text" id="date_to" required class="datepicker form-control" placeholder="Pick a date" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="container form-group">
                                    <div class="form-line">
                                        <label for="notice_text">Notice</label>
                                        <input type="text" id="notice_text" required class="form-control" placeholder="Enter the notice here">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="addNoticeAsync();" class="btn btn-primary waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="message" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="messageLabel">Send Message</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="container form-group">
                                    <div class="form-line">
                                        <label for="room_no">Room Number</label>
                                        <input type="text" id="room_no" class="form-control" placeholder="Room No" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="container form-group">
                                    <div class="form-line">
                                        <label for="message_text">Message</label>
                                        <input type="text" id="message_text" class="form-control" placeholder="Enter the message here" required>
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

    <div class="modal fade" id="room_number" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="room_numberLabel">Change Room Number</h4>
                </div>
                <div class="modal-body">
                    <h5 style="color:red;">The room number will get reset. The room will have to be allocted again</h5>
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="container form-group">
                                <div class="form-line">
                                    <label for="change_mis_id">MIS Id</label>
                                    <input type="text" id="change_mis_id" class="form-control" placeholder="Enter the MIS Id" required pattern="[A-Z0-9]{11,15}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="submitRegNo();" class="btn btn-primary waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addNoticeCallback(responseText) {
            if(responseText == "Fields cannot be empty") {
                swal({
                    title: "Error!",
                    text: "Fields cannot be empty. Please try again.",
                    type: "error",
                });
            }
            else if(responseText == "Success") {
                swal({
                    title: "Done!",
                    text: "Notice has been issued successfully!",
                    type: "success",
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
            else {
                console.log(responseText);
                swal({
                    title: "Error!",
                    text: "An unexpected error occured. Please try again or contact the administrator",
                    type: "error",  
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
        }

        function addNoticeAsync() {
            noticeText = document.getElementById("notice_text").value;
            endDate = document.getElementById("date_to").value;
            startDate = document.getElementById("date_from").value;
            noticeCategory = document.getElementById("notice_category").value;
            var params = "category=" + noticeCategory + "&endDate=" + endDate + "&startDate=" + startDate + "&noticeText=" + noticeText; 
            httpPostAsync("add_notice.php", params, addNoticeCallback);
        }

    </script>
     
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

    <!-- Sweetalert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Moment Plugin Js -->
    <script src="../plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/forms/basic-form-elements.js"></script>
    <script src="../js/async_connect.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <script>
        function submitChange(resultJson) {
            var JSONresult = JSON.parse(resultJson);
            if(JSONresult.result == "Room unallocated successfully!")
            {
                swal({
                    title: "Done!",
                    text: "Room unallocated successfully!",
                    type: "success",
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
            else
            {
                swal({
                    title: "Error!",
                    text: "An unexpected error occured. Please try again or contact the administrator",
                    type: "error",  
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
        }

        $(document).ready(function(){
            $(".required").after("<span style='color:red;'> *</span>");
        });

        function submitRegNo()
        {
            change_mis_id = document.getElementById("change_mis_id").value;
            postData = "misID=" + change_mis_id;
            httpPostAsync('unallocate.php', postData, submitChange);
        }

        function successLate(resultJson) {
            var JSONresult = JSON.parse(resultJson);
            if(JSONresult.result == "Entry made successfully!")
            {
                swal({
                    title: "Done!",
                    text: "Entry made successfully!",
                    type: "success",
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
            else
            {
                swal({
                    title: "Error!",
                    text: "An unexpected error occured. Please try again or contact the administrator",
                    type: "error",  
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
        }

        function successNoon(resultJson) {
            var JSONresult = JSON.parse(resultJson);
            if(JSONresult.result == "Entry made successfully!")
            {
                swal({
                    title: "Done!",
                    text: "Entry made successfully!",
                    type: "success",
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
            else
            {
                swal({
                    title: "Error!",
                    text: "An unexpected error occured. Please try again or contact the administrator",
                    type: "error",  
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
        }

        function submitLate(){
            room_no = document.getElementById("late_room_no").value;
            time = document.getElementById("late_time").value;
            reason = document.getElementById("reason").value;
            postData = "room_no=" + room_no + "&time=" + time + "&reason=" + reason;
            httpPostAsync('late_entry.php', postData, successLate);
        }

        function submitNoon(){
            room_no = document.getElementById("noon_room_no").value;
            postData = "room_no=" + room_no;
            httpPostAsync('noon_entry.php', postData, successNoon);
        }
    </script>
</body>

</html>
