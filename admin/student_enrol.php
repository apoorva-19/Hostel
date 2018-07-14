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
    $year = date("Y");
    $g_student = "SELECT * FROM `New_Registrations` WHERE GENDER = 'F' AND YEAR(Reg_Date) = '".$year."';";
    $g_res_student = mysqli_query($mysqli, $g_student);
    $g_count = mysqli_num_rows($g_res_student);
    $b_student = "SELECT * FROM `New_Registrations` WHERE GENDER = 'M' AND YEAR(Reg_Date) = '".$year."';";
    $b_res_student = mysqli_query($mysqli, $b_student);
    $b_count = mysqli_num_rows($b_res_student);
?>

<html>
    <script>
        $(document).ready(function() {
            $("#new_students").addClass("active");
        }); 
    </script>
<body>
<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-pink ">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">GIRLS HOSTEL</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $g_count; ?>" data-speed="50" data-fresh-interval="20"><?php echo $g_count; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-blue ">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">BOYS HOSTEL</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $b_count; ?>" data-speed="50" data-fresh-interval="20"><?php echo $b_count;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>New Students' Information (GIRLS HOSTEL)</h2>
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
                                $cnt = 1;
                                while($g_row_student = $g_res_student->fetch_assoc())
                                {
                                    echo "<tr>
                                            <th scope=\"row\">".$cnt."</th>
                                            <td>".$g_row_student['Name']."</td>
                                            <td>".$g_row_student['MIS']."</td>
                                            <td>".$g_row_student['Email_Id']."</td>
                                            <td>".$g_row_student['City']."</td>";
                                            if($g_row_student['Admission_Type'] == 'M')
                                                echo "<td>Management Quota</td>";
                                            else if($g_row_student['Admission_Type'] == 'C')
                                                echo "<td>CAP Rounds</td>";
                                            else if($g_row_student['Admission_Type'] == 'P')
                                                echo "<td>PIO</td>";
                                            else if($g_row_student['Admission_Type'] == 'CI')
                                                echo "<td>CIWGC</td>";
                                            else if($g_row_student['Admission_Type'] == 'JK')
                                                echo "<td>Jammu and Kashmir</td>";
                                            else if($g_row_student['Admission_Type'] == 'DSE')
                                                echo "<td>Direct Second Year</td>";
                                            else
                                                echo "<td>Others</td>";
                                            echo "<td>".$g_row_student['Receipt_No']."</td>";
                                            echo "<td>".$g_row_student['Amount_Paid']."</td>";
                                            if($g_row_student['Room_No'] == 0)
                                                echo "<td>Not alloted</td>";
                                            else
                                                echo "<td>".$g_row_student['Room_No']."</td>";
                                    echo  "</tr>";
                                    $cnt += 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>New Students' Information (BOYS' HOSTEL)</h2>
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
                                $cnt = 1;
                                while($b_row_student = $b_res_student->fetch_assoc())
                                {
                                    echo "<tr>
                                            <th scope=\"row\">".$cnt."</th>
                                            <td>".$b_row_student['Name']."</td>
                                            <td>".$b_row_student['MIS']."</td>
                                            <td>".$b_row_student['Email_Id']."</td>
                                            <td>".$b_row_student['City']."</td>";
                                            if($b_row_student['Admission_Type'] == 'M')
                                                echo "<td>Management Quota</td>";
                                            else if($b_row_student['Admission_Type'] == 'C')
                                                echo "<td>CAP Rounds</td>";
                                            else if($b_row_student['Admission_Type'] == 'P')
                                                echo "<td>PIO</td>";
                                            else if($b_row_student['Admission_Type'] == 'CI')
                                                echo "<td>CIWGC</td>";
                                            else if($b_row_student['Admission_Type'] == 'JK')
                                                echo "<td>Jammu and Kashmir</td>";
                                            else if($b_row_student['Admission_Type'] == 'DSE')
                                                echo "<td>Direct Second Year</td>";
                                            else
                                                echo "<td>Others</td>";
                                            echo "<td>".$b_row_student['Receipt_No']."</td>";
                                            echo "<td>".$b_row_student['Amount_Paid']."</td>";
                                            if($b_row_student['Room_No'] == 0)
                                                echo "<td>Not alloted</td>";
                                            else
                                                echo "<td>".$b_row_student['Room_No']."</td>";
                                    echo  "</tr>";
                                    $cnt +=1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>