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
    require_once('../connect.php');
    require_once('base.php');
    $mis = test_input($_SESSION["user"]);
    $sql = "SELECT Night_Out_Count, Late_Count, Noon_Count FROM Hostelite WHERE MIS = ?";
    if(!($verify_student = $mysqli->prepare($sql)))
    {
        //error_log('Prepare failed for verifying student in change_room.php: ('.$mysqli->errno.') '.$mysqli->error);
        echo "<script>swal({
            title: 'Error',
            text: 'Request could not be processed. We are trying to fix the error.',
            type: 'error'
        })</script>";
        exit;
    }
    if(!($verify_student->bind_param('s', $mis)))
    {
        //error_log('Bind param failed for verifying student in change_room.php: ('.$mysqli->errno.') '.$mysqli->error);
        echo "<script>swal({
            title: 'Error',
            text: 'Request could not be processed. We are trying to fix the error.',
            type: 'error'
        })</script>";
        exit;
    }
    if(!$verify_student->execute())
    {
        //error_log('Execution failed for verifying student in change_room.php: ('.$mysqli->errno.') '.$mysqli->error);
        echo "<script>swal({
            title: 'Error',
            text: 'Request could not be processed. We are trying to fix the error.',
            type: 'error'
        })</script>";
        exit;
    }
    $count = $verify_student->get_result();
    $count = $count->fetch_assoc();
    $night = $count['Night_Out_Count'];
    $late = $count['Late_Count'];
    $noon = $count['Noon_Count'];
?>

<!DOCTYPE html>
<html>
    <script>
        window.onload = function() {
            document.getElementById("menu_home").classList.add("active");

            loadNotices();
        }

        function getNoticesCallback(noticesJson) {
            jsonObj = JSON.parse(noticesJson);

            for(i=0; i<jsonObj.length; i++) {
                category = jsonObj[i].Category;
                dateFrom = jsonObj[i].Date_From;
                dateTo = jsonObj[i].Date_To;
                noticeText = jsonObj[i].Notice_Text;

                divNotice = document.getElementById("notices");
                var divCol = document.createElement("div");
                divCol.className = "col-xs-12 col-sm-12 col-md-6 col-lg-4";
                
                var divCard = document.createElement("div");
                divCard.className = "card";
                
                var divHeader = document.createElement("div");
                divHeader.className = "header";
                var noticeTitle = document.createElement("h2");
                var noticeCategory = document.createTextNode(category);
                var titleSmallText = document.createElement("small");
                titleSmallText.innerHTML = "From:  " + dateFrom + "<br>To:  " + dateTo;

                var divBody = document.createElement("div");
                divBody.className = "body";
                divBody.innerHTML = noticeText;

                noticeTitle.appendChild(noticeCategory);
                noticeTitle.appendChild(titleSmallText);
                divHeader.appendChild(noticeTitle);
                divCard.appendChild(divHeader);
                divCard.appendChild(divBody);
                divCol.appendChild(divCard);
                divNotice.appendChild(divCol);
            }
        }

        function loadNotices() {
            httpGetAsync("get_notices.php", getNoticesCallback);
        }
    </script>
<body>
    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-red ">
                            <i class="material-icons">report_problem</i>
                        </div>
                        <div class="content">
                            <div class="text">LATE REMARKS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $late; ?>" data-speed="500" data-fresh-interval="20"><?php echo $late; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-amber ">
                            <i class="material-icons">access_time</i>
                        </div>
                        <div class="content">
                            <div class="text">AFTERNOON REMARKS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $noon; ?>" data-speed="500" data-fresh-interval="20"><?php echo $noon; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-purple">
                            <i class="material-icons">directions_run</i>
                        </div>
                        <div class="content">
                            <div class="text">LEAVE REMARKS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $night; ?>" data-speed="500" data-fresh-interval="20"><?php echo $night; ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block-header">
                <h2>NOTICES</h2>
            </div>

            <div id="notices" class="row clearfix">

                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>Notice Title 1</h2>
                        </div>
                        <div class="body">
                            Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra
                        </div>
                    </div>
                </div> 
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>Notice Title 2</h2>
                        </div>
                        <div class="body">
                            Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra
                        </div>
                    </div>
                </div> 
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>Notice Title 3</h2>
                        </div>
                        <div class="body">
                            Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra
                        </div>
                    </div>
                </div>  -->

            </div>
            <div class="row clearfix">

            </div>
        </div>
    </section>
<body>

</html>