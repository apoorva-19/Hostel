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
    $student = "SELECT * FROM `Hostelite`";
    $res_student = mysqli_query($mysqli, $student);
    $count = mysqli_num_rows($res_student);
?>

<!DOCTYPE html>
<html>
<head>
    <script>
        window.onload = function() {
            document.getElementById("menu_student").classList.add("active");
        }
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
                                    while($row_student = $res_student->fetch_assoc())
                                    {
                                        echo "<tr>
                                                <th scope=\"row\">".$cnt."</th>
                                                <td>".$row_student['Name']."</td>";
                                                if($row_student['Room_No'] == 0)
                                                    echo "<td>xxxxxxxxxxx</td>";
                                                else
                                                    echo "<td>".$row_student['MIS']."</td>
                                                <td>".$row_student['Email_Id']."</td>
                                                <td>".$row_student['City']."</td>";
                                                if($row_student['Admission_Type'] == 'M')
                                                    echo "<td>Management Quota</td>";
                                                else if($row_student['Admission_Type'] == 'C')
                                                    echo "<td>CAP Rounds</td>";
                                                else if($row_student['Admission_Type'] == 'P')
                                                    echo "<td>PIO</td>";
                                                else if($row_student['Admission_Type'] == 'CI')
                                                    echo "<td>CIWGC</td>";
                                                else if($row_student['Admission_Type'] == 'JK')
                                                    echo "<td>Jammu and Kashmir</td>";
                                                else if($row_student['Admission_Type'] == 'DSE')
                                                    echo "<td>Direct Second Year</td>";
                                                else
                                                    echo "<td>Others</td>";
                                                if($row_student['Room_No'] == 0)
                                                    echo "<td>xxxxxxxxxxx</td>";
                                                else
                                                    echo "<td>".$row_student['Receipt_No']."</td>";
                                                if($row_student['Room_No'] == 0)
                                                    echo "<td>xxxxxx</td>";
                                                else
                                                    echo "<td>".$row_student['Amount_Paid']."</td>";
                                                if($row_student['Room_No'] == 0)
                                                    echo "<td>Not alloted</td>";
                                                else
                                                    echo "<td>".$row_student['Room_No']."</td>";
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