<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../404.html");
        exit;
    }
    if($_SESSION["user"] != "admin")
    {
        header("Location:../404.html");
        exit;
    }
    require_once('base.php');
    require_once('../connect.php');

    $g_vacant = "SELECT COUNT(`Room_No`) FROM `G_Room` WHERE `Reserved` = 'N';";
    $g_reserved = "SELECT COUNT(`Room_No`) FROM `G_Room` WHERE `Reserved` = 'Y';";
    $g_res_vacant = mysqli_query($mysqli, $g_vacant);
    $g_res_reserved = mysqli_query($mysqli, $g_reserved);
    $g_row_vacant = $g_res_vacant->fetch_assoc();
    $g_row_reserved = $g_res_reserved->fetch_assoc();
    $b_vacant = "SELECT COUNT(`Room_No`) FROM `B_Room` WHERE `Reserved` = 'N';";
    $b_reserved = "SELECT COUNT(`Room_No`) FROM `B_Room` WHERE `Reserved` = 'Y';";
    $b_res_vacant = mysqli_query($mysqli, $b_vacant);
    $b_res_reserved = mysqli_query($mysqli, $b_reserved);
    $b_row_vacant = $b_res_vacant->fetch_assoc();
    $b_row_reserved = $b_res_reserved->fetch_assoc();
    $vacant = $g_row_vacant["COUNT(`Room_No`)"] + $b_row_vacant["COUNT(`Room_No`)"];
    $reserved = $g_row_reserved["COUNT(`Room_No`)"] + $b_row_reserved["COUNT(`Room_No`)"];
?>

<!DOCTYPE html>
<html>
    <script>
        $(document).ready(function() {
            $("#menu_home").addClass("active");
        }); 
    </script>
<body>
    <section class="content">   
        <div class="container-fluid">
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div id="wizard_horizontal">
                            <h2>GIRLS' HOSTEL</h2>
                            <section>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box hover-expand-effect">
                                            <div class="icon  bg-light-green ">
                                                <i class="material-icons">face</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">VACANT SEATS</div>
                                                <div class="number count-to" data-from="0" data-to="<?php echo $g_row_vacant["COUNT(`Room_No`)"]; ?>" data-speed="50" data-fresh-interval="20"><?php echo $g_row_vacant["COUNT(`Room_No`)"]; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box hover-expand-effect">
                                            <div class="icon  bg-brown ">
                                                <i class="material-icons">room</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">RESERVED SEATS</div>
                                                <div class="number count-to" data-from="0" data-to="<?php echo $g_row_reserved["COUNT(`Room_No`)"]; ?>" data-speed="50" data-fresh-interval="20"><?php echo $g_row_reserved["COUNT(`Room_No`)"];?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box hover-expand-effect">
                                            <div class="icon  bg-grey ">
                                                <i class="material-icons">bookmark</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">TOTAL SEATS</div>
                                                <div class="number count-to" data-from="0" data-to="212" data-speed="500" data-fresh-interval="20">212</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box hover-expand-effect">
                                            <div class="icon  bg-green">
                                                <i class="material-icons">person_pin</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">PRESENT</div>
                                                <div class="number count-to" data-from="0" data-to="" data-speed="50" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box hover-expand-effect">
                                            <div class="icon  bg-blue-grey">
                                                <i class="material-icons">directions_run</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">NIGHT OUT</div>
                                                <div class="number count-to" data-from="0" data-to="" data-speed="50" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box hover-expand-effect">
                                            <div class="icon  bg-purple ">
                                                <i class="material-icons">person</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">TOTAL STRENGTH</div>
                                                <div class="number count-to" data-from="0" data-to="" data-speed="500" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box hover-expand-effect">
                                            <div class="icon  bg-red ">
                                                <i class="material-icons">report_problem</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">LATE COUNT</div>
                                                <div class="number count-to" data-from="0" data-to="" data-speed="50" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box hover-expand-effect">
                                            <div class="icon  bg-amber ">
                                                <i class="material-icons">access_time</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">NOON COUNT</div>
                                                <div class="number count-to" data-from="0" data-to="" data-speed="50" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <h2>BOYS' HOSTEL</h2>
                            <section>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box hover-expand-effect">
                                        <div class="icon  bg-light-green ">
                                            <i class="material-icons">face</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">VACANT SEATS</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $b_row_vacant["COUNT(`Room_No`)"]; ?>" data-speed="50" data-fresh-interval="20"><?php echo $b_row_vacant["COUNT(`Room_No`)"]; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box hover-expand-effect">
                                        <div class="icon  bg-brown ">
                                            <i class="material-icons">room</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">RESERVED SEATS</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $b_row_reserved["COUNT(`Room_No`)"]; ?>" data-speed="50" data-fresh-interval="20"><?php echo $b_row_reserved["COUNT(`Room_No`)"];?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box hover-expand-effect">
                                        <div class="icon  bg-grey ">
                                            <i class="material-icons">bookmark</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">TOTAL SEATS</div>
                                            <div class="number count-to" data-from="0" data-to="135" data-speed="500" data-fresh-interval="20">135</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box hover-expand-effect">
                                        <div class="icon  bg-green">
                                            <i class="material-icons">person_pin</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">PRESENT</div>
                                            <div class="number count-to" data-from="0" data-to="" data-speed="50" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box hover-expand-effect">
                                        <div class="icon  bg-blue-grey">
                                            <i class="material-icons">directions_run</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">NIGHT OUT</div>
                                            <div class="number count-to" data-from="0" data-to="" data-speed="50" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box hover-expand-effect">
                                        <div class="icon  bg-purple ">
                                            <i class="material-icons">person</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">TOTAL STRENGTH</div>
                                            <div class="number count-to" data-from="0" data-to="" data-speed="500" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box hover-expand-effect">
                                        <div class="icon  bg-red ">
                                            <i class="material-icons">report_problem</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">LATE COUNT</div>
                                            <div class="number count-to" data-from="0" data-to="" data-speed="50" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box hover-expand-effect">
                                        <div class="icon  bg-amber ">
                                            <i class="material-icons">access_time</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">NOON COUNT</div>
                                            <div class="number count-to" data-from="0" data-to="" data-speed="50" data-fresh-interval="20"></div>
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
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>New Students Information</h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Registration Number</th>
                                    <th>Email Id</th>
                                    <th>Place of Residence</th>
                                    <th>Admission Type</th>
                                    <th>Receipt Number</th>
                                    <th>Fees Paid</th>
                                    <th>Room Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $students="SELECT * FROM `New_Registrations` WHERE `Reg_Date` = '".date("Y-m-d")."';";
                                if($result = mysqli_query($mysqli, $students))
                                {
                                    $cnt=1;
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo "<tr>
                                                <th scope=\"row\">".$cnt."</th>
                                                <td>".$row['Name']."</td>
                                                <td>".$row['MIS']."</td>
                                                <td>".$row['Email_Id']."</td>
                                                <td>".$row['City']."</td>";
                                                if($row['Admission_Type'] == 'M')
                                                echo "<td>Management Quota</td>";
                                                else if($row['Admission_Type'] == 'C')
                                                echo "<td>CAP Rounds</td>";
                                                else
                                                echo "<td>Others</td>";
                                                echo "<td>".$row['Receipt_No']."</td>";
                                                echo "<td>".$row['Amount_Paid']."</td>";
                                                if($row['Room_No'] == 0)
                                                {
                                                if($row['Gender'] == 'F')
                                                    $link = "g_layout.php";
                                                else
                                                    $link = "b_layout.php";
                                                echo "<td><form method='POST' action='".$link."'><button type='submit' id='allocate'".$cnt." name='allocate' value='".$row['MIS']."' class='form-contol btn btn-primary waves-effect mt-5'>Allocate Room</button></form></td>";
                                                }
                                                else  
                                                echo "<td>".$row['Room_No']."</td>";
                                        echo  "</tr>";
                                        $cnt += 1;
                                    }
                                }
                                else
                                    echo 'too bad';
                                ?>
                            </tbody>
                        </table>
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

    <!--<script type="text/javascript">
        document.getElementById("allocate").onclick = function () {
            location.href = "layout.php";
        };
    </script>-->
    <?php
        // echo "<script>
        //         var allocateBtnArray = document.getElementsByName('allocate');
        //         for(var i = 0; i < allocateBtnArray.length; i++) {
        //             var allocateBtn = allocateBtnArray[i].onclick = function() {
        //                 location.href = 'layout.php';
        //             }
        //         }
        //         document.getElementsByName('allocate').onclick = function() {
        //             location.href = 'layout.php';
        //         };
        //         </script>"

    ?>
</body>

</html>