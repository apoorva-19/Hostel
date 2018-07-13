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
    require_once('../convert.php');
    $start_date = $end_date = date('Y-m-d');

    $b_hostel = "SELECT Noon_Record.MIS, Name, Noon_Record.Room_No, Date, Noon_Count FROM Noon_Record INNER JOIN Hostelite ON Noon_Record.MIS = Hostelite.MIS AND Gender = 'M' AND Date >= ? AND Date <= ?;";
    if(!($b_hostel = $mysqli->prepare($b_hostel)))
    {
        //error_log('Prepare failed in student_noon.php: ('.$mysqli->errno.') '.$mysqli->error);
        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        exit;
    }
    if(!($b_hostel->bind_param('ss',$start_date, $end_date)))
    {
        //error_log('Execution failed in student_noon.php: ('.$mysqli->errno.') '.$mysqli->error);
        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        exit;
    }
    if(!($b_hostel->execute()))
    {
        //error_log('Execution failed in student_noon.php: ('.$mysqli->errno.') '.$mysqli->error);
        $jsonArray["result"] = "Request could not be processed. We are trying to fix the error.";
        exit;
    }
    $b_res_hostel = $b_hostel->get_result();
?>

<html>

<body>
    <section class="content">
        <div class="container-fluid">
        <div class="card">
                <div class="header">
                    <h4>Student Afternoon List</h4>
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
                                                        <td>".$b_row['Noon_Count']."</td>";
                                                echo  "</tr>";
                                                $cnt += 1;
                                            }
                                        }
                                        else
                                        {
                                            echo "<tr>
                                            <th></th>
                                            <td></td>
                                            <td>No entries found.</td>
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
                    $('#b_table').append("<tr><th></th><td></td><td>No entries found.</td><td></td><td></td></tr>");
                }
            }
            
        }
        function submitDate()
        {
            start_date = document.getElementById('start_date').value;
            end_date = document.getElementById('end_date').value;
            postData = "start_date=" + start_date + "&end_date=" + end_date;
            httpPostAsync('data_noon.php', postData, successRange);
        }
    </script>
</body>
</html>