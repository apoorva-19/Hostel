<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../404.html");
        exit;
    }
    if($_SESSION["user"] != "g_warden")
    {
        header("Location:../404.html");
        exit;
    }
    require_once('base.php');
    require_once('../connect.php');
    $year = date("Y");
    $sql = "SELECT * FROM `Hostelite` WHERE `GENDER` = 'F' AND YEAR(`Reg_Date`) = ?";
    if(!$student_list = $mysqli->prepare($sql))
    {
        echo "<script>
            swal({
                title: 'Error',
                text: 'Request could not be processed. We are trying to fix the error.',
                type: 'error'
            }).then(() => {
                window.location.href = 'index.php';
            });
        });</script>";
    }
    else
    {
        if(!$student_list->bind_param('s', $year))
        {
            echo "<script>
                swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                }).then(() => {
                    window.location.href = 'index.php';
                });
            });</script>";
        }
        else
        {
            if(!$student_list->execute())
            {
                echo "<script>
                    swal({
                        title: 'Error',
                        text: 'Request could not be processed. We are trying to fix the error.',
                        type: 'error'
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                });</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<script>
        $(document).ready(function() {
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
                                        $result = $student_list->get_result();
                                        if($result->num_rows == 0)
                                            echo "<tr>
                                                    <td colspan='9'><center>No hostelites enrolled</center></td>
                                                  </tr>";
                                        else
                                        {
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
                                                else if($row['Admission_Type'] == 'P')
                                                    echo "<td>PIO</td>";
                                                else if($row['Admission_Type'] == 'CI')
                                                    echo "<td>CIWGC</td>";
                                                else if($row['Admission_Type'] == 'JK')
                                                    echo "<td>Jammu and Kashmir</td>";
                                                else if($row['Admission_Type'] == 'DSE')
                                                    echo "<td>Direct Second Year</td>";
                                                else
                                                    echo "<td>Others</td>";
                                                echo "<td>".$row['Receipt_No']."</td>";
                                                echo "<td>".$row['Amount_Paid']."</td>";
                                                echo "<td>".$row['Room_No']."</td>";
                                                echo "</tr>";
                                                $cnt += 1;
                                            }
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
</html>