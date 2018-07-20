<?php
    session_start();
    if(empty(trim($_SESSION["user"])))
    {
        header("Location:../404.html");
        exit;
    }
    if(empty(trim($_SESSION["gender"])))
    {
        header("Location:../404.html");
        exit;
    }
    if($_SESSION["user"] != $_COOKIE["user"])
    {
        header("Location:../404.html");
        exit;
    }
    require_once('base.php');
?>

<html>

<body>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Website Developers</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="" style="padding-left:5%;padding-right:5%;"> 
                                    <h4 style="color:#0000b2;">Hey there!</h4>
                                    <p style="font-size:120%;">If you find any bugs in the system, just drop in a mail to anyone of us. We will get back to you as soon as possible!</p>
                                </div>
                                <br>
                            </div>
                            <div class="row clearfix">
                                <div>
                                <div class="col-md-3 ">
                                    <center><img src="../images/apoorva.jpg" alt="Apoorva Maheshwari" class="round-img"><center>
                                    <center><h4>Apoorva Maheshwari</h4></center>
                                </div>
                                <div class="col-md-3 ">
                                    <div>
                                    <br>
                                    <br>
                                    <h4 style="color:#0000b2;">Areas of Expertise</h4>
                                    <div>
                                        <ul>
                                            <li>UX/UI Design</li>
                                            <li>Backend and Database Management</li>
                                        </ul>
                                        <div class="demo-icon-container"><div class="demo-google-material-icon"> <i class="material-icons">email</i> <span class="icon-name">apoorva19.am@gmail.com</span> </div></div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div>
                                <div class="col-md-3 ">
                                    <center><img src="../images/vishva.jpg" alt="Vishva Iyer" class="round-img"><center>
                                    <center><h4>Vishva Iyer</h4></center>
                                </div>
                                <div class="col-md-3 ">
                                    <br>
                                    <br>
                                    <h4 style="color:#0000b2;">Areas of Expertise</h4>
                                    <div >
                                        <ul>
                                            <li>UX/UI Design</li>
                                            <li>Backend and Database Management</li>
                                        </ul>
                                        <div class="demo-icon-container"><div class="demo-google-material-icon"> <i class="material-icons">email</i> <span class="icon-name">vishvanatarajan@gmail.com</span> </div></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3 ">
                                    <center><img src="../images/era.jpg" alt="Eravatee Raje" class="round-img"><center>
                                    <center><h4>Eravatee Raje</h4></center>
                                </div>
                                <div class="col-md-3 ">
                                    <br>
                                    <br>
                                    <h4 style="color:#0000b2;">Areas of Expertise</h4>
                                    <div >
                                        <ul>
                                            <li>UX/UI Design</li>
                                            <li>Database Management</li>
                                        </ul>
                                        <div class="demo-icon-container"><div class="demo-google-material-icon"> <i class="material-icons">email</i> <span class="icon-name">eraraje1997@gmail.com</span> </div></div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <center><img src="../images/sabari.jpg" alt="Sabarinath S." class="round-img"><center>
                                    <center><h4>Sabarinath S.</h4></center>
                                </div>
                                <div class="col-md-3 ">
                                    <br>
                                    <br>
                                    <h4 style="color:#0000b2;">Areas of Expertise</h4>
                                    <div >
                                        <ul>
                                            <li>UX/UI Design</li>
                                            <li>Backend and Database Management</li>
                                        </ul>
                                        <div class="demo-icon-container"><div class="demo-google-material-icon"> <i class="material-icons">email</i> <span class="icon-name">sabarinath1996@gmail.com</span> </div></div>
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