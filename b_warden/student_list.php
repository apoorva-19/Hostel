<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../404.html");
        exit;
    }
    if($_SESSION["user"] != "b_warden")
    {
        header("Location:../404.html");
        exit;
    }
    require_once('base.php');
    require_once('../connect.php');
    $year = date("Y");
    $b_student = "SELECT * FROM `New_Registrations` WHERE GENDER = 'M' AND YEAR(Reg_Date) = '".$year."';";
    $b_res_student = mysqli_query($mysqli, $b_student);
    $b_count = mysqli_num_rows($b_res_student);
?>

<!DOCTYPE html>
<html>
<head>
    <script>
        $(document).ready(function() {
            // $("#menu_student_lists").addClass("toggled");
            // document.getElementById("menu_student_lists").classList.add("toggled");
            // document.getElementById("menu_studentlist_super").click();
            $("#all_hostelites").addClass("active");
        }); 
    </script>
</head>

<body>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Student Information</h2>
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
                                                <td>".$b_row_student['Name']."</td>";
                                        if($b_row_student['Room_No'] == 0)
                                            echo "<td>xxxxxxxxxxx</td>";
                                        else
                                            echo "<td>".$b_row_student['MIS']."</td>";
                                        echo "<td>".$b_row_student['Email_Id']."</td>
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
                                        if($b_row_student['Room_No'] == 0)
                                            echo "<td>xxxxxxxxxxx</td>";
                                        else
                                            echo "<td>".$b_row_student['Receipt_No']."</td>";
                                        if($b_row_student['Room_No'] == 0)
                                            echo "<td>xxxxxx</td>";
                                        else
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
        </div>
    </section>
</body>