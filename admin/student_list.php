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
?>
<!DOCTYPE html>
<html>
<head>
    <script>
        $(document).ready(function() {
            $("#current_students").addClass("active");
        }); 
    </script>
</head>

<body>
    <section class="content">
        <div class="container-fluid">
        <div class="card">
                <div class="header">
                    <h4>Student List</h4>
                </div>
                <div class="row clearfix">
                    <div class="body">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="view_students_select">Select Hostel</label>
                                <select class="form-control" id="view_students_select">
                                    <option value="A" selected>All Hostelites</option>
                                    <option value="G">Girl's Hostel</option>
                                    <option value="B">Boy's Hostel</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-2"></div>
                                <div class="col-md-10 mx-auto m-t-5">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg m-t-5 waves-effect" onclick="submitHostel();">Submit</button>
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
            </div>
            <br>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Student Information</h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed" id="table">
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
                                <tbody id="table-body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        httpGetAsync("get_hostelites.php?option=1", populateResult);
    });
</script>
<script type="text/javascript" src="../js/async_connect.js"></script>
<script type="text/javascript">
    function populateResult(jsonResult) {
        result = JSON.parse(jsonResult);
        if(result.status === "success") {
            var table = document.getElementById("table-body");
            table.innerHTML = "";
            if(result.noOfRecords == 0) {
                var row = document.createElement("tr");
                var rowData = document.createElement("td");
                rowData.colSpan = 8;
                var centerTag = document.createElement("center");
                centerTag.innerHTML = "No hostelites enrolled";
                rowData.appendChild(centerTag);
                row.appendChild(rowData);
                table.appendChild(row);
            }
            else {
                for(i = 0; i < result.noOfRecords; i++) { 
                    var row = document.createElement("tr");
                    var rowHead = document.createElement("th");
                    rowHead.classList.add("row");
                    rowHead.innerHTML = i+1;
                    row.appendChild(rowHead);
                    currentRecord = result.records[i];
                    for(j = 0; j < currentRecord.length; j++) {
                        var rowData = document.createElement("td");
                        rowData.innerHTML = currentRecord[j]
                        row.appendChild(rowData);
                    }
                    table.appendChild(row);
                }
            }
        }
        else
            swal({
                title: 'Error',
                text: jsonResult.message,
                type: 'error'
            }).then(() => {
                window.location.href = "index.php";
            });
    }

        function submitHostel() {
            var select = document.getElementById("view_students_select");
            var option = select.options[select.selectedIndex].value;
            if(option === "A")
                httpGetAsync("get_hostelites.php?option=1", populateResult);
            else if(option === "G")
                httpGetAsync("get_hostelites.php?option=2", populateResult);
            else if(option === "B")
                httpGetAsync("get_hostelites.php?option=3", populateResult);
            else
                swal({
                    title: 'Invalid option selected',
                    text: 'Please select a valid option',
                    type: 'warning'
                });
        }
</script>
</html>