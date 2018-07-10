<?php
    session_start();
    $errorMessage = "";
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adminUsername']) && isset($_POST['adminPassword']))
    {
        if((!filter_input(INPUT_POST, 'adminUsername', FILTER_SANITIZE_STRING) === false) || (!filter_input(INPUT_POST, 'adminPassword', FILTER_SANITIZE_STRING) === false))
        {
            // Send error message saying invalid input found and exit
            $errorMessage = "Invalid input entered";
        }
        if($_POST["adminUsername"] == "g_warden" && $_POST["adminPassword"] == "gpictotel@3006#")
        {
            // Valid username and password for girl's warden
            $_SESSION["user"] = "g_warden";
            header("Location:g_warden/index.php");
            exit;
        }
        else if($_POST["adminUsername"] == "b_warden" && $_POST["adminPassword"] == "bpictotel@3006$")
        {
            // Valid username and password for boy's warden
            $_SESSION["user"] = "b_warden";
            header("Location:b_warden/index.php");
            exit;
        }
        else if($_POST["adminUsername"] == "admin" && $_POST["adminPassword"] == "apictotel@3006%")
        {
            // Valid username and password for boy's warden
            $_SESSION["user"] = "admin";
            header("Location:admin/index.php");
            exit;
        }
        else
        {
            // Invalid username and password
            $errorMessage = "Invalid username or password";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1061494064895-dndnkjleql0qfougmi97tejg3fl7pbp0.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>Sign In</title>
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
                <a class="navbar-brand" href="index.html">SCTR's PICT Hostel</a>
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
                <center><h2 class="form-title" id="signup"><span>or</span>Student Login</h2></center>
                <div class="form-holder google">
                    <center><div class="g-signin2" data-onsuccess="onSignIn" data-theme=""></div></center>
                </div>
                <h2 class="form-title">or Sign up</h2>
                <button class="submit-btn" id="sign_up">Sign up</button>
            </div>
            <div class="login slide-up">
                <div class="center">
                    <h2 class="form-title" id="login"><span>or</span>Staff Login</h2>
                    <form id="sign_in" method="POST" action="">
                        <div class="form-holder">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="adminUsername" placeholder="Username" required autofocus>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="form-control" name="adminPassword" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                    <button type="submit" class="submit-btn">Log in</button>
                    </form>
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

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src=" plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src=" js/admin.js"></script>
    <script src=" js/pages/forms/basic-form-elements.js"></script>
    <script src="js/async_connect.js"</script>

    <!-- Demo Js -->
    <script src=" js/demo.js"></script>
    <script src="js/login.js"></script>
    <script>
         document.getElementById("sign_up").onclick = function () {
            window.location.href = "sign_up.php";
        };
        $(document).ready(function(){
            $(".required").after("<span style='color:red;'> *</span>");
        });
    </script>

    <script>
      function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        // console.log('Full Name: ' + profile.getName());
        // console.log("Image URL: " + profile.getImageUrl());
        // console.log("Email: " + profile.getEmail());
        // var name = profile.getName();
        var email = profile.getEmail();
        var id_token = googleUser.getAuthResponse().id_token;
        // console.log("ID Token: " + id_token);
        postData = "email=" + email + "&id_token=" + id_token;
        httpPostAsync('verify_log.php', postData, successSignin);        
      };
    </script>
</body>

</html>