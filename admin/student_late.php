<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../403.html");
        exit;
    }
    if($_SESSION["user"] != "admin")
    {
        header("Location:../403.html");
        exit;
    }
    require_once('base.php');
    require_once('../connect.php');
    require_once('../convert.php');
    $start_date = $end_date = date('Y-m-d');
    $g_hostel = "SELECT Hostelite.MIS, Hostelite.Name, Late_Record.Room_No, Date, Time, Late_Count FROM Late_Record INNER JOIN Hostelite ON Late_Record.MIS = Hostelite.MIS WHERE Date BETWEEN ? AND ? AND Hostelite.Gender = 'F';";
    $b_hostel = "SELECT Late_Record.MIS, Hostelite.Name, Late_Record.Room_No, Date, Time, Late_Count FROM Late_Record INNER JOIN Hostelite ON Late_Record.MIS = Hostelite.MIS WHERE Date BETWEEN ? AND ? AND Hostelite.Gender = 'M';";
    if(!($g_hostel = $mysqli->prepare($g_hostel)))
    {
        //error_log('Prepare failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        exit;
    }
    if(!($g_hostel->bind_param('ss',$start_date, $end_date)))
    {
        //error_log('Execution failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        exit;
    }
    if(!($g_hostel->execute()))
    {
        //error_log('Execution failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        exit;
    }
    $g_res_hostel = $g_hostel->get_result();
    if(!($b_hostel = $mysqli->prepare($b_hostel)))
    {
        //error_log('Prepare failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        exit;
    }
    if(!($b_hostel->bind_param('ss',$start_date, $end_date)))
    {
        //error_log('Execution failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        exit;
    }
    if(!($b_hostel->execute()))
    {
        //error_log('Execution failed in student_night_out.php: ('.$mysqli->errno.') '.$mysqli->error);
        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        exit;
    }
    $b_res_hostel = $b_hostel->get_result();    
?>

<html>
    <script>
        $(document).ready(function() {
            $("#student_late").addClass("active");
        }); 
    </script>
<body>
    <section class="content">
        <div class="container-fluid">
        <div class="card">
                <div class="header">
                    <h4>Student Late List</h4>
                </div>
                <h5 style="padding-left:1.4%; color:blue;">Pick a date range. By default it shows for the current date.</h5>
                <div class="row clearfix">
                    <div class="body">
                        <div class="form-group">
                            <div class="col-md-3">
                                <div class="form-line">
                                    <label class="required" for="start_date">Start Date</label>
                                    <input type="text" id="start_date" name="start_date" class="datepicker form-control" placeholder="Pick a date" /> 
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-line">
                                    <label class="required" for="end_date">End Date</label>
                                    <input type="text" id="end_date" name="end_date" class="datepicker form-control" placeholder="Pick a date" /> 
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-10 mx-auto m-t-5">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg m-t-5 waves-effect" onclick="submitDate();">Submit</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 mx-auto m-t-5">
                                    <button type="submit" class="btn bg-brown btn-block btn-lg m-t-5 waves-effect">Generate Report</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="body">
                        <div class="form-group">
                            <div class="col-md-3">
                                <div class="form-line">
                                    <label for="g_count">GIRLS' HOSTEL COUNT</label>
                                    <p id="g_count"><?php echo $g_res_hostel->num_rows; ?></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-line">
                                    <label for="b_count">BOYS' HOSTEL COUNT</label>
                                    <p id="b_count"><?php echo $b_res_hostel->num_rows; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GIRLS' HOSTEL</h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Registration Number</th>
                                        <th>Room No</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody id="g_table">
                                    <?php
                                        if($g_res_hostel->num_rows != 0)
                                        {
                                            $cnt=1;
                                            while($g_row = $g_res_hostel->fetch_assoc())
                                            {
                                                echo "<tr>
                                                        <th scope=\"row\">".$cnt."</th>
                                                        <td>".$g_row['Name']."</td>
                                                        <td>".$g_row['MIS']."</td>
                                                        <td>".$g_row['Room_No']."</td>
                                                        <td>".$g_row['Date']."</td>
                                                        <td>".$g_row['Time']."</td>
                                                        <td>".$g_row['Late_Count']."</td>";
                                                echo  "</tr>";
                                                $cnt += 1;
                                            }
                                        }
                                        else
                                        {
                                            echo "<tr>
                                            <th></th>
                                            <td></td>
                                            <td></td>
                                            <td>No entries found.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            </tr>";
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
                            <h2>BOYS' HOSTEL</h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Registration Number</th>
                                        <th>Room No</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody id="b_table">
                                    <?php
                                        if($b_res_hostel->num_rows != 0)
                                        {
                                            $cnt=1;
                                            while($b_row = $b_res_hostel->fetch_assoc())
                                            {
                                                echo "<tr>
                                                        <th scope=\"row\">".$cnt."</th>
                                                        <td>".$b_row['Name']."</td>
                                                        <td>".$b_row['MIS']."</td>
                                                        <td>".$b_row['Room_No']."</td>
                                                        <td>".$b_row['Date']."</td>
                                                        <td>".$b_row['Time']."</td>
                                                        <td>".$b_row['Late_Count']."</td>";
                                                echo  "</tr>";
                                                $cnt += 1;
                                            }
                                        }
                                        else
                                        {
                                            echo "<tr>
                                            <th></th>
                                            <td></td>
                                            <td></td>
                                            <td>No entries found.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            </tr>";
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
    <script>
        function successRange(resultJson)
        {
            var JSONresult = JSON.parse(resultJson);
            if(JSONresult.exception.result == "Request could not be processed. We are trying to fix the error.")
            {
                swal({
                    title: "Error",
                    text: "Request could not be processed. We are trying to fix the error.",
                    type: "error"
                });
            }
            else 
            {
                // document.getElementById('g_table').innerHTML = "";
                $('#g_table').html("");
                document.getElementById('g_count').innerHTML = JSONresult.gTr.length;
                if(JSONresult.gTr.length){
                    JSONresult.gTr.forEach(function(girl){
                        $('#g_table').append(girl);
                    });
                }
                else
                {
                    $('#g_table').append("<tr><th></th><td></td><td></td><td>No entries found.</td><td></td><td></td><td></td></tr>");
                }

                $('#b_table').html("");
                console.log(JSONresult.bTr.length);
                document.getElementById('b_count').innerHTML = JSONresult.bTr.length;
                if(JSONresult.bTr.length){
                    JSONresult.bTr.forEach(function(boy){
                        $('#b_table').append(boy);
                    });
                }
                else
                {
                    $('#b_table').append("<tr><th></th><td></td><td></td><td>No entries found.</td><td></td><td></td><td></td></tr>");
                }
            }
            
        }
        function submitDate()
        {
            start_date = document.getElementById('start_date').value;
            end_date = document.getElementById('end_date').value;
            postData = "start_date=" + start_date + "&end_date=" + end_date;
            httpPostAsync('data_late.php', postData, successRange);
        }
    </script>
</body>
</html>