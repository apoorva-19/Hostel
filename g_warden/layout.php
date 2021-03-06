<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../403.html");
        exit;
    }
    if($_SESSION["user"] != "g_warden")
    {
        header("Location:../403.html");
        exit;
    }
    if(empty($_POST["allocate"]))
    {
        header("Location: ../403.html");
        exit;
    }
    require_once('../connect.php');
    require_once('base.php');
    $misID = test_input($_POST["allocate"]);
    echo '<input type="hidden" value="'.$misID.'" id="mis">';
?>
<html>
    <head>
    <style>
        table tr td {
            border-color : #ffffff !important;
            white-space:nowrap;
        }
    </style>
    </head>
    <script>
        window.onload = function() {
            httpGetAsync("room_status.php", roomStatusCallback);
        }
    
        function roomStatusCallback(roomStatusJson) {
            jsonObj = JSON.parse(roomStatusJson);
            
            for(i=0; i<jsonObj.length; i++) {
                roomNo = jsonObj[i].Room_No;
                reserved = jsonObj[i].Reserved;
                var btn_temp = document.getElementById(roomNo);
                if(reserved == "Y") {
                    btn_temp.disabled = true;
                    btn_temp.style.background = "#ff0800";
                    //TODO modify disabled button to be red, and disable hover(green) on these buttons
                }
                else
                    btn_temp.disabled = false;
            }
        }

        function submitResult(resultJson) {
            var JSONresult = JSON.parse(resultJson);
            if(JSONresult.result == "Room has been alloted successfully!")
            {
                swal({
                    title: "Done!",
                    text: "Room has been alloted successfully!",
                    type: "success",
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
            else if (JSONresult.result = "Details not verified. Please verify and try again.")
            {
                swal({
                    title: "Error!",
                    text: "Details not verified. Please verify and try again.",
                    type: "error",  
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
            else
            {
                swal({
                    title: "Error!",
                    text: "An unexpected error occured. Please try again or contact the administrator",
                    type: "error",  
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
        }

        function successFees(resultJson) {
            var JSONresult = JSON.parse(resultJson);
            if(JSONresult.result == "MIS Id, Receipt Number and Amount Paid have been verified. Room can now be allocated.")
            {
                swal({
                    title: "Done!",
                    text: "MIS Id, Receipt Number and Amount Paid have been verified. Room can now be allocated.",
                    type: "success",
                });
            }
            else 
            {
                swal({
                    title: "Error!",
                    text: "MIS Id, Receipt Number and Amount Paid have not been verified.",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if(result.value){
                        window.location.href="index.php";
                    }
                });
            }
        }
    </script>

    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="card">
                        <div class="header">
                            <h2>GIRLS HOSTEL ROOM ALLOTMENT CHART</h2>
                        </div>    
                        <div class="row clearfix">
                            <div class="body">
                                <div class="demo-button-toolbar seating">
                                    <table class="table table-condensed" style="width: 0%;">
                                        <tr>
                                            <td style="vertical-align:middle">G</td>
                                            <td style="padding-left:0px; padding-right:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="001A" onclick="setText(this);" value="001A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">001A</button>
                                                        <button id="002A" onclick="setText(this);" value="002A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">002A</button>
                                                        <button id="003A" onclick="setText(this);" value="003A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">003A</button>
                                                        <button id="004A" onclick="setText(this);" value="004A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">004A</button>
                                                        <button id="005A" onclick="setText(this);" value="005A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">005A</button>
                                                        <button id="006A" onclick="setText(this);" value="006A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">006A</button>
                                                        <button id="007A" onclick="setText(this);" value="007A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">007A</button>
                                                        <button id="008A" onclick="setText(this);" value="008A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">008A</button>
                                                        <button id="009A" onclick="setText(this);" value="009A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">009A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button onclick="setText(this);" id="001B" value="001B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">001B</button>
                                                        <button onclick="setText(this);" id="002B" value="002B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">002B</button>
                                                        <button onclick="setText(this);" id="003B" value="003B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">003B</button>
                                                        <button onclick="setText(this);" id="004B" value="004B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">004B</button>
                                                        <button onclick="setText(this);" id="005B" value="005B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">005B</button>
                                                        <button onclick="setText(this);" id="006B" value="006B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">006B</button>
                                                        <button onclick="setText(this);" id="007B" value="007B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">007B</button>
                                                        <button onclick="setText(this);" id="008B" value="008B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">008B</button>
                                                        <button onclick="setText(this);" id="009B" value="009B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">009B</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td style="vertical-align:middle">1</td>
                                            <td style="padding-left:0px; padding-right:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button onclick="setText(this);" id="101A" value="101A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">101A</button>
                                                        <button onclick="setText(this);" id="102A" value="102A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">102A</button>
                                                        <button onclick="setText(this);" id="103A" value="103A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">103A</button>
                                                        <button onclick="setText(this);" id="104A" value="104A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">104A</button>
                                                        <button onclick="setText(this);" id="105A" value="105A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">105A</button>
                                                        <button onclick="setText(this);" id="106A" value="106A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">106A</button>
                                                        <button onclick="setText(this);" id="107A" value="107A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">107A</button>
                                                        <button onclick="setText(this);" id="108A" value="108A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">108A</button>
                                                        <button onclick="setText(this);" id="109A" value="109A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">109A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button onclick="setText(this);" id="101B" value="101B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">101B</button>
                                                        <button onclick="setText(this);" id="102B" value="102B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">102B</button>
                                                        <button onclick="setText(this);" id="103B" value="103B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">103B</button>
                                                        <button onclick="setText(this);" id="104B" value="104B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">104B</button>
                                                        <button onclick="setText(this);" id="105B" value="105B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">105B</button>
                                                        <button onclick="setText(this);" id="106B" value="106B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">106B</button>
                                                        <button onclick="setText(this);" id="107B" value="107B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">107B</button>
                                                        <button onclick="setText(this);" id="108B" value="108B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">108B</button>
                                                        <button onclick="setText(this);" id="109B" value="109B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">109B</button>
                                                    </div>    
                                                </div>
                                            </td>
                                            <td style="padding-left:0px; padding-right:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                    <button onclick="setText(this);" id="110A" value="110A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">110A</button>
                                                    <button onclick="setText(this);" id="111A" value="111A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">111A</button>
                                                    <button onclick="setText(this);" id="112A" value="112A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">112A</button>
                                                    <button onclick="setText(this);" id="113A" value="113A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">113A</button>
                                                    <button onclick="setText(this);" id="114A" value="114A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">114A</button>
                                                    <button onclick="setText(this);" id="115A" value="115A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">115A</button>
                                                    <button onclick="setText(this);" id="116A" value="116A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">116A</button>
                                                    <button onclick="setText(this);" id="117A" value="117A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">117A</button>
                                                    <button onclick="setText(this);" id="118A" value="118A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">118A</button>
                                                    <button onclick="setText(this);" id="119A" value="119A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">119A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <button id="110B" onclick="setText(this);" value="110B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">110B</button>
                                                        <button id="111B" onclick="setText(this);" value="111B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">111B</button>
                                                        <button id="112B" onclick="setText(this);" value="112B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">112B</button>
                                                        <button id="113B" onclick="setText(this);" value="113B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">113B</button>
                                                        <button id="114B" onclick="setText(this);" value="114B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">114B</button>
                                                        <button id="115B" onclick="setText(this);" value="115B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">115B</button>
                                                        <button id="116B" onclick="setText(this);" value="116B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">116B</button>
                                                        <button id="117B" onclick="setText(this);" value="117B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">117B</button>
                                                        <button id="118B" onclick="setText(this);" value="118B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">118B</button>
                                                        <button id="119B" onclick="setText(this);" value="119B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">119B</button>
                                                    </div>
                                                </div> 
                                            </td>    
                                        </tr>  
                                        <tr>
                                            <td style="vertical-align:middle">2</td> 
                                            <td style="padding-left:0px; padding-right:0px; margin:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="201A" onclick="setText(this);" value="201A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">201A</button>
                                                        <button id="202A" onclick="setText(this);" value="202A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">202A</button>
                                                        <button id="203A" onclick="setText(this);" value="203A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">203A</button>
                                                        <button id="204A" onclick="setText(this);" value="204A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">204A</button>
                                                        <button id="205A" onclick="setText(this);" value="205A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">205A</button>
                                                        <button id="206A" onclick="setText(this);" value="206A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">206A</button>
                                                        <button id="207A" onclick="setText(this);" value="207A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">207A</button>
                                                        <button id="208A" onclick="setText(this);" value="208A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">208A</button>
                                                        <button id="209A" onclick="setText(this);" value="209A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">209A</button>
                                                    </div>    
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="201B" onclick="setText(this);" value="201B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">201B</button>
                                                        <button id="202B" onclick="setText(this);" value="202B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">202B</button>
                                                        <button id="203B" onclick="setText(this);" value="203B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">203B</button>
                                                        <button id="204B" onclick="setText(this);" value="204B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">204B</button>
                                                        <button id="205B" onclick="setText(this);" value="205B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">205B</button>
                                                        <button id="206B" onclick="setText(this);" value="206B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">206B</button>
                                                        <button id="207B" onclick="setText(this);" value="207B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">207B</button>
                                                        <button id="208B" onclick="setText(s);" value="208B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">208B</button>
                                                        <button id="209B" onclick="setText(this);" value="209B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">209B</button>
                                                    </div>    
                                                </div>
                                            </td>
                                            <td style="padding-left:0px; padding-right:0px; margin:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                    <button id="210A" onclick="setText(this);" value="210A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">210A</button>
                                                    <button id="211A" onclick="setText(this);" value="211A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">211A</button>
                                                    <button id="212A" onclick="setText(this);" value="212A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">212A</button>
                                                    <button id="213A" onclick="setText(this);" value="213A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">213A</button>
                                                    <button id="214A" onclick="setText(this);" value="214A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">214A</button>
                                                    <button id="215A" onclick="setText(this);" value="215A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">215A</button>
                                                    <button id="216A" onclick="setText(this);" value="216A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">216A</button>
                                                    <button id="217A" onclick="setText(this);" value="217A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">217A</button>
                                                    <button id="218A" onclick="setText(this);" value="218A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">218A</button>
                                                    <button id="219A" onclick="setText(this);" value="219A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">219A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <button id="210B" onclick="setText(this);" value="210B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">210B</button>
                                                        <button id="211B" onclick="setText(this);" value="211B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">211B</button>
                                                        <button id="212B" onclick="setText(this);" value="212B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">212B</button>
                                                        <button id="213B" onclick="setText(this);" value="213B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">213B</button>
                                                        <button id="214B" onclick="setText(this);" value="214B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">214B</button>
                                                        <button id="215B" onclick="setText(this);" value="215B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">215B</button>
                                                        <button id="216B" onclick="setText(this);" value="216B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">216B</button>
                                                        <button id="217B" onclick="setText(this);" value="217B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">217B</button>
                                                        <button id="218B" onclick="setText(this);" value="218B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">218B</button>
                                                        <button id="219B" onclick="setText(this);" value="219B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">219B</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle">3</td> 
                                            <td style="padding-left:0px; padding-right:0px;margin:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="301A" onclick="setText(this);" value="301A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">301A</button>
                                                        <button id="302A" onclick="setText(this);" value="302A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">302A</button>
                                                        <button id="303A" onclick="setText(this);" value="303A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">303A</button>
                                                        <button id="304A" onclick="setText(this);" value="304A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">304A</button>
                                                        <button id="305A" onclick="setText(this);" value="305A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">305A</button>
                                                        <button id="306A" onclick="setText(this);" value="306A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">306A</button>
                                                        <button id="307A" onclick="setText(this);" value="307A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">307A</button>
                                                        <button id="308A" onclick="setText(this);" value="308A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">308A</button>
                                                        <button id="309A" onclick="setText(this);" value="309A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">309A</button>
                                                    </div>    
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="301B"  onclick="setText(this);" value="301B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">301B</button>
                                                    <button id="302B"  onclick="setText(this);" value="302B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">302B</button>
                                                    <button id="303B"  onclick="setText(this);" value="303B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">303B</button>
                                                    <button id="304B"  onclick="setText(this);" value="304B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">304B</button>
                                                    <button id="305B"  onclick="setText(this);" value="305B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">305B</button>
                                                    <button id="306B"  onclick="setText(this);" value="306B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">306B</button>
                                                    <button id="307B"  onclick="setText(this);" value="307B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">307B</button>
                                                    <button id="308B"  onclick="setText(this);" value="308B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">308B</button>
                                                    <button id="309B"  onclick="setText(this);" value="309B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">309B</button>
                                                    </div>    
                                                </div>
                                            </td>
                                            <td style="padding-left:0px; padding-right:0px;margin:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <button id="310A" onclick="setText(this);" value="310A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">310A</button>
                                                        <button id="311A" onclick="setText(this);" value="311A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">311A</button>
                                                        <button id="312A" onclick="setText(this);" value="312A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">312A</button>
                                                        <button id="313A" onclick="setText(this);" value="313A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">313A</button>
                                                        <button id="314A" onclick="setText(this);" value="314A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">314A</button>
                                                        <button id="315A" onclick="setText(this);" value="315A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">315A</button>
                                                        <button id="316A" onclick="setText(this);" value="316A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">316A</button>
                                                        <button id="317A" onclick="setText(this);" value="317A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">317A</button>
                                                        <button id="318A" onclick="setText(this);" value="318A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">318A</button>
                                                        <button id="319A" onclick="setText(this);" value="319A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">319A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <button id="310B"  onclick="setText(this);" value="310B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">310B</button>
                                                        <button id="311B"  onclick="setText(this);" value="311B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">311B</button>
                                                        <button id="312B"  onclick="setText(this);" value="312B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">312B</button>
                                                        <button id="313B"  onclick="setText(this);" value="313B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">313B</button>
                                                        <button id="314B"  onclick="setText(this);" value="314B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">314B</button>
                                                        <button id="315B"  onclick="setText(this);" value="315B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">315B</button>
                                                        <button id="316B"  onclick="setText(this);" value="316B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">316B</button>
                                                        <button id="317B"  onclick="setText(this);" value="317B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">317B</button>
                                                        <button id="318B"  onclick="setText(this);" value="318B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">318B</button>
                                                        <button id="319B"  onclick="setText(this);" value="319B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">319B</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td style="vertical-align:middle">4</td> 
                                            <td style="margin:0px;"></td>
                                            <td style="padding-left:0px; padding-right:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="401A"  onclick="setText(this);" value="401A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">401A</button>
                                                        <button id="402A"  onclick="setText(this);" value="402A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">402A</button>
                                                        <button id="403A"  onclick="setText(this);" value="403A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">403A</button>
                                                        <button id="404A"  onclick="setText(this);" value="404A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">404A</button>
                                                        <button id="405A"  onclick="setText(this);" value="405A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">405A</button>
                                                        <button id="406A"  onclick="setText(this);" value="406A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">406A</button>
                                                        <button id="407A"  onclick="setText(this);" value="407A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">407A</button>
                                                        <button id="408A"  onclick="setText(this);" value="408A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">408A</button>
                                                        <button id="409A"  onclick="setText(this);" value="409A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">409A</button>
                                                        <button id="410A"  onclick="setText(this);" value="410A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">410A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="401B"  onclick="setText(this);" value="401B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">401B</button>
                                                    <button id="402B"  onclick="setText(this);" value="402B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">402B</button>
                                                    <button id="403B"  onclick="setText(this);" value="403B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">403B</button>
                                                    <button id="404B"  onclick="setText(this);" value="404B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">404B</button>
                                                    <button id="405B"  onclick="setText(this);" value="405B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">405B</button>
                                                    <button id="406B"  onclick="setText(this);" value="406B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">406B</button>
                                                    <button id="407B"  onclick="setText(this);" value="407B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">407B</button>
                                                    <button id="408B"  onclick="setText(this);" value="408B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">408B</button>
                                                    <button id="409B"  onclick="setText(this);" value="409B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">409B</button>
                                                    <button id="410B"  onclick="setText(this);" value="410B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">410B</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle">5</td>
                                            <td style="margin:0px;"></td> 
                                            <td style="padding-left:0px; padding-right:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="501A"  onclick="setText(this);" value="501A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">501A</button>
                                                        <button id="502A"  onclick="setText(this);" value="502A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">502A</button>
                                                        <button id="503A"  onclick="setText(this);" value="503A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">503A</button>
                                                        <button id="504A"  onclick="setText(this);" value="504A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">504A</button>
                                                        <button id="505A"  onclick="setText(this);" value="505A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">505A</button>
                                                        <button id="506A"  onclick="setText(this);" value="506A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">506A</button>
                                                        <button id="507A"  onclick="setText(this);" value="507A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">507A</button>
                                                        <button id="508A"  onclick="setText(this);" value="508A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">508A</button>
                                                        <button id="509A"  onclick="setText(this);" value="509A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">509A</button>
                                                        <button id="510A"  onclick="setText(this);" value="510A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">510A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="501B"  onclick="setText(this);" value="501B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">501B</button>
                                                    <button id="502B"  onclick="setText(this);" value="502B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">502B</button>
                                                    <button id="503B"  onclick="setText(this);" value="503B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">503B</button>
                                                    <button id="504B"  onclick="setText(this);" value="504B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">504B</button>
                                                    <button id="505B"  onclick="setText(this);" value="505B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">505B</button>
                                                    <button id="506B"  onclick="setText(this);" value="506B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">506B</button>
                                                    <button id="507B"  onclick="setText(this);" value="507B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">507B</button>
                                                    <button id="508B"  onclick="setText(this);" value="508B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">508B</button>
                                                    <button id="509B"  onclick="setText(this);" value="509B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">509B</button>
                                                    <button id="510B"  onclick="setText(this);" value="510B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">510B</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle">6</td>
                                            <td style="margin:0px;"></td> 
                                            <td style="padding-left:0px; padding-right:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="601A"  onclick="setText(this);" value="601A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">601A</button>
                                                        <button id="602A"  onclick="setText(this);" value="602A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">602A</button>
                                                        <button id="603A"  onclick="setText(this);" value="603A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">603A</button>
                                                        <button id="604A"  onclick="setText(this);" value="604A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">604A</button>
                                                        <button id="605A"  onclick="setText(this);" value="605A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">605A</button>
                                                        <button id="606A"  onclick="setText(this);" value="606A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">606A</button>
                                                        <button id="607A"  onclick="setText(this);" value="607A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">607A</button>
                                                        <button id="608A"  onclick="setText(this);" value="608A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">608A</button>
                                                        <button id="609A"  onclick="setText(this);" value="609A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">609A</button>
                                                        <button id="610A"  onclick="setText(this);" value="610A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">610A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="601B"  onclick="setText(this);" value="601B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">601B</button>
                                                    <button id="602B"  onclick="setText(this);" value="602B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">602B</button>
                                                    <button id="603B"  onclick="setText(this);" value="603B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">603B</button>
                                                    <button id="604B"  onclick="setText(this);" value="604B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">604B</button>
                                                    <button id="605B"  onclick="setText(this);" value="605B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">605B</button>
                                                    <button id="606B"  onclick="setText(this);" value="606B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">606B</button>
                                                    <button id="607B"  onclick="setText(this);" value="607B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">607B</button>
                                                    <button id="608B"  onclick="setText(this);" value="608B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">608B</button>
                                                    <button id="609B"  onclick="setText(this);" value="609B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">609B</button>
                                                    <button id="610B"  onclick="setText(this);" value="610B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">610B</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle">7</td> 
                                            <td style="margin:0px;"></td>
                                            <td style="padding-left:0px; padding-right:0px;">
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="701A"  onclick="setText(this);" value="701A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">701A</button>
                                                        <button id="702A"  onclick="setText(this);" value="702A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">702A</button>
                                                        <button id="703A"  onclick="setText(this);" value="703A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">703A</button>
                                                        <button id="704A"  onclick="setText(this);" value="704A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">704A</button>
                                                        <button id="705A"  onclick="setText(this);" value="705A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">705A</button>
                                                        <button id="706A"  onclick="setText(this);" value="706A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">706A</button>
                                                        <button id="707A"  onclick="setText(this);" value="707A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">707A</button>
                                                        <button id="708A"  onclick="setText(this);" value="708A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">708A</button>
                                                        <button id="709A"  onclick="setText(this);" value="709A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">709A</button>
                                                        <button id="710A"  onclick="setText(this);" value="710A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">710A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="701B"  onclick="setText(this);" value="701B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">701B</button>
                                                    <button id="702B"  onclick="setText(this);" value="702B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">702B</button>
                                                    <button id="703B"  onclick="setText(this);" value="703B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">703B</button>
                                                    <button id="704B"  onclick="setText(this);" value="704B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">704B</button>
                                                    <button id="705B"  onclick="setText(this);" value="705B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">705B</button>
                                                    <button id="706B"  onclick="setText(this);" value="706B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">706B</button>
                                                    <button id="707B"  onclick="setText(this);" value="707B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">707B</button>
                                                    <button id="708B"  onclick="setText(this);" value="708B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">708B</button>
                                                    <button id="709B"  onclick="setText(this);" value="709B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">709B</button>
                                                    <button id="710B"  onclick="setText(this);" value="710B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">710B</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <div class="form-line">
                                                    <label for="roomNo">You picked room number</label>
                                                    <p id="roomNo"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type='button' id="submit_btn" onclick="submitRoomNo();" class="btn btn-primary mt-5 waves-effect" style="float:right;">Submit</button>
                                </div>
                                <!-- <button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;">Submit</button>     -->
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
        <div class="modal fade" id="verify_fees" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <form method="post" action="">
                    <div class="modal-header">
                        <h4 class="modal-title" id="verify_fees">Verify Fees</h4>
                    </div>
                    <div class="modal-body">
                    <div class="row clearfix">
                        <div class="form-group col-md-12">
                            <div class="form-line">
                                <label for="verify_mis_id">MIS Id</label>
                                <input type="text" id="verify_mis_id" class="form-control" placeholder="Enter the MIS Id" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="form-group col-md-12">
                            <div class="form-line">
                                <label for="receipt_no">Receipt Number</label>
                                <input type="text" id="receipt_no" class="form-control" placeholder="Enter the receipt number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="form-group col-md-12">
                            <div class="form-line">
                                <label for="amount_paid">Amount Paid</label>
                                <input type="number" min=0 id="amount_paid" class="form-control" placeholder="Enter the fees paid" required>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="submitFees();" class="btn btn-link waves-effect" data-dismiss="modal">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>                       
    </body>
    <script>
    var flag=0;
    function setText(element) {
        if(flag != 0)
            flag.setAttribute('style', 'background-color: #fffff !important');
        element.setAttribute('style', 'background-color: #2dc492 !important');
        $("#roomNo").empty();
        document.getElementById("roomNo").appendChild(document.createTextNode(element.value));
        flag = element;
    }

    function submitRoomNo() {
        roomNo = document.getElementById('roomNo').innerHTML;
        misID = document.getElementById('mis').value;
        postData = "roomNo=" + roomNo + "&misID=" + misID;
        httpPostAsync('allocate_room.php', postData, submitResult);
    }

    function submitFees(){
        misID = document.getElementById('mis').value;
        amt = document.getElementById('amount_paid').value;
        receipt_no = document.getElementById('receipt_no').value;
        verify_mis_id = document.getElementById('verify_mis_id').value;
        postData = "misID=" + misID + "&amt=" + amt + "&receipt_no=" + receipt_no + "&verify_mis_id=" + verify_mis_id;
        httpPostAsync('check_fees.php', postData, successFees);
    }

    </script>
    <script type="text/javascript">
        $(window).on('load', function(){
            $('#verify_fees').modal({backdrop: 'static', keyboard: false})  
        });
    </script>
</html>