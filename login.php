<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Log In</title>
    <!-- Favicon-->
    <link rel="icon" href=" favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href=" plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href=" plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href=" plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href=" plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href=" plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href=" plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Sweetalert2 -->
    <link href=" plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href=" plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href=" css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href=" css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-indigo login-page">
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
    <!-- Top Bar -->
    <nav class="navbar" style="background: rgba(63,81,181,0.5);">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a class="navbar-brand" href="index.php">SCTR's PICT Hostel</a>
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
    <section class="content">
        <div class="form-structor">
            <div class="signup">
                <center><img src="images/transparent_logo.png"></center>
                <h2 class="form-title" id="signup"><span>or</span>Student Login</h2>
                    <div class="form-holder">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" id="mis" placeholder="MIS" name="mis" required autofocus pattern="^[ICE]{1}2K[0-9]{8}">
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" id="s_password" placeholder="Password" name="username" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn" id="studentLoginBtn">Log in</button>
                <h4 class="form-title"><center>or</center></h4>
                <button class="submit-btn" id="sign_up">Sign up</button>
            </div>
            <div class="login slide-up">
                <div class="center">
                    <h2 class="form-title" id="login"><span>or</span>Staff Login</h2>
                        <div class="form-holder">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="adminUsername form-control" id="adminUsername" placeholder="Username" required autofocus>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="adminPassword form-control" id="adminPassword" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                    <button type="button" class="submit-btn" id="staffLoginBtn">Log in</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src=" plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src=" plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src=" plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src=" plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src=" plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src=" plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src=" plugins/momentjs/moment.js"></script>

    <!-- Sweetalert2 -->
    <script src=" plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src=" plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src=" js/admin.js"></script>
    <script src=" js/pages/forms/basic-form-elements.js"></script>
    <script src=" js/async_connect.js"></script>

    <!-- Demo Js -->
    <script src=" js/demo.js"></script>
    <script src=" js/login.js"></script>

    <script>
         document.getElementById("sign_up").onclick = function () {
            window.location.href = "sign_up.php";
        };
        $(document).ready(function(){
            $(".required").after("<span style='color:red;'> *</span>");
            
            $("#staffLoginBtn").click(function(){
                
                var username = document.getElementById("adminUsername").value;
                var password = document.getElementById("adminPassword").value;
                httpPostAsync("staff_login.php", "username=" + username + "&password=" + password, loginResult);
            });

            $("#studentLoginBtn").click(function(){
                var mis = document.getElementById("mis").value;
                var password = document.getElementById("s_password").value;
                httpPostAsync("student_login.php", "mis="+mis+"&password="+password, loginResult);
            });
        });
        function loginResult(result) 
        {
            var JSONresult = JSON.parse(result);
            if(JSONresult.status == "success")
                window.location.href = JSONresult.url;  
            else
            {
                swal({
                    title: 'Login unsuccessful',
                    text: JSONresult.message,
                    type: 'error'
                });
            }
        }
    </script>
</body>

</html>