<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("Location:../404.html");
        exit;
    }
    if(!($_SESSION["user"] === "b_warden"))
    {
        header("Location:../404.html");
        exit;
    }
    if(!isset($_POST["allocate"]))
    {
        header("Location:../404.html");
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
    table tr  td{
      border: white !important;
    }
  </style>
</head>
    <script>
        window.onload = function() {
            httpGetAsync("room_status.php", roomStatusCallback);
        }

        function roomStatusCallback(roomStatusJson) {
            jsonObj = JSON.parse(roomStatusJson);
            try {
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
            } catch (err) { console.log(i);}
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
                }, function(isConfirm) {
                    if(isConfirm) {
                        window.location.href = "index.php";
                    }
                });
            }
            else
            {
                setTimeout(function() {
                    swal({
                        title: "Error!",
                        text: "An unexpected error occured. Please try again or contact the administrator",
                        type: "error"
                    });
                }, 200);
            }
        }
    </script>
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="card">
                        <div class="header">
                            <h2>BOYS HOSTEL ROOM ALLOTMENT CHART</h2>
                        </div>
                        <div class="row clearfix">
                            <div class="body">
                                <div class="demo-button-toolbar clearfix">
                                    <table class="table table-condensed" style="width: 0%; border:white">
                                        <tr>
                                            <td style="vertical-align:middle">1</td>
                                            <td style="padding-left:0px; padding-right:0px;">                                        
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="101A" onclick="setText(this);" value="101A" type="button" class="seating-btn seating-btn seating-btn btn btn-default btn-xs waves-effect">101A</button>
                                                        <button id="102A" onclick="setText(this);" value="102A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">102A</button>
                                                        <button id="103A" onclick="setText(this);" value="103A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">103A</button>
                                                        <button id="104A" onclick="setText(this);" value="104A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">104A</button>
                                                        <button id="105A" onclick="setText(this);" value="105A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">105A</button>
                                                        <button id="106A" onclick="setText(this);" value="106A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">106A</button>
                                                        <button id="107A" onclick="setText(this);" value="107A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">107A</button>
                                                        <button id="108A" onclick="setText(this);" value="108A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">108A</button>
                                                        <button id="109A" onclick="setText(this);" value="109A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">109A</button>
                                                        <button id="110A" onclick="setText(this);" value="110A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">110A</button>
                                                        <button id="111A" onclick="setText(this);" value="111A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">111A</button>
                                                        <button id="112A" onclick="setText(this);" value="112A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">112A</button>
                                                        <button id="113A" onclick="setText(this);" value="113A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">113A</button>
                                                        <button id="114A" onclick="setText(this);" value="114A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">114A</button>
                                                        <button id="115A" onclick="setText(this);" value="115A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">115A</button>
                                                        <button id="116A" onclick="setText(this);" value="116A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">116A</button>
                                                        <button id="117A" onclick="setText(this);" value="117A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">117A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="101B" onclick="setText(this);" value="101B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">101B</button>
                                                        <button id="102B" onclick="setText(this);" value="102B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">102B</button>
                                                        <button id="103B" onclick="setText(this);" value="103B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">103B</button>
                                                        <button id="104B" onclick="setText(this);" value="104B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">104B</button>
                                                        <button id="105B" onclick="setText(this);" value="105B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">105B</button>
                                                        <button id="106B" onclick="setText(this);" value="106B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">106B</button>
                                                        <button id="107B" onclick="setText(this);" value="107B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">107B</button>
                                                        <button id="108B" onclick="setText(this);" value="108B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">108B</button>
                                                        <button id="109B" onclick="setText(this);" value="109B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">109B</button>
                                                        <button id="110B" onclick="" value="---" type="button" class="seating-btn btn btn-default btn-xs waves-effect" disabled>-------</button>
                                                        <button id="111B" onclick="setText(this);" value="111B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">111B</button>
                                                        <button id="112B" onclick="setText(this);" value="112B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">112B</button>
                                                        <button id="113B" onclick="setText(this);" value="113B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">113B</button>
                                                        <button id="114B" onclick="setText(this);" value="114B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">114B</button>
                                                        <button id="115B" onclick="setText(this);" value="115B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">115B</button>
                                                        <button id="116B" onclick="setText(this);" value="116B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">116B</button>
                                                        <button id="117B" onclick="setText(this);" value="117B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">117B</button>
                                                    </div>    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle">2</td>
                                            <td style="padding-left:0px; padding-right:0px;">                                        
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
                                                        <button id="210A" onclick="setText(this);" value="210A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">210A</button>
                                                        <button id="211A" onclick="setText(this);" value="211A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">211A</button>
                                                        <button id="212A" onclick="setText(this);" value="212A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">212A</button>
                                                        <button id="213A" onclick="setText(this);" value="213A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">213A</button>
                                                        <button id="214A" onclick="setText(this);" value="214A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">214A</button>
                                                        <button id="215A" onclick="setText(this);" value="215A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">215A</button>
                                                        <button id="216A" onclick="setText(this);" value="216A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">216A</button>
                                                        <button id="217A" onclick="setText(this);" value="217A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">217A</button>
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
                                                        <button id="208B" onclick="setText(this);" value="208B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">208B</button>
                                                        <button id="209B" onclick="setText(this);" value="209B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">209B</button>
                                                        <button id="210B" onclick="setText(this);" value="210B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">210B</button>
                                                        <button id="211B" onclick="setText(this);" value="211B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">211B</button>
                                                        <button id="212B" onclick="setText(this);" value="212B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">212B</button>
                                                        <button id="213B" onclick="setText(this);" value="213B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">213B</button>
                                                        <button id="214B" onclick="setText(this);" value="214B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">214B</button>
                                                        <button id="215B" onclick="setText(this);" value="215B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">215B</button>
                                                        <button id="216B" onclick="setText(this);" value="216B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">216B</button>
                                                        <button id="217B" onclick="setText(this);" value="217B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">217B</button>
                                                    </div>    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle">3</td>
                                            <td style="padding-left:0px; padding-right:0px;">                                        
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
                                                        <button id="310A" onclick="setText(this);" value="310A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">310A</button>
                                                        <button id="311A" onclick="setText(this);" value="311A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">311A</button>
                                                        <button id="312A" onclick="setText(this);" value="312A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">312A</button>
                                                        <button id="313A" onclick="setText(this);" value="313A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">313A</button>
                                                        <button id="314A" onclick="setText(this);" value="314A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">314A</button>
                                                        <button id="315A" onclick="setText(this);" value="315A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">315A</button>
                                                        <button id="316A" onclick="setText(this);" value="316A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">316A</button>
                                                        <button id="317A" onclick="setText(this);" value="317A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">317A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="301B" onclick="setText(this);" value="301B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">301B</button>
                                                        <button id="302B" onclick="setText(this);" value="302B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">302B</button>
                                                        <button id="303B" onclick="setText(this);" value="303B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">303B</button>
                                                        <button id="304B" onclick="setText(this);" value="304B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">304B</button>
                                                        <button id="305B" onclick="setText(this);" value="305B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">305B</button>
                                                        <button id="306B" onclick="setText(this);" value="306B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">306B</button>
                                                        <button id="307B" onclick="setText(this);" value="307B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">307B</button>
                                                        <button id="308B" onclick="setText(this);" value="308B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">308B</button>
                                                        <button id="309B" onclick="setText(this);" value="309B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">309B</button>
                                                        <button id="310B" onclick="setText(this);" value="310B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">310B</button>
                                                        <button id="311B" onclick="setText(this);" value="311B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">311B</button>
                                                        <button id="312B" onclick="setText(this);" value="312B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">312B</button>
                                                        <button id="313B" onclick="setText(this);" value="313B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">313B</button>
                                                        <button id="314B" onclick="setText(this);" value="314B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">314B</button>
                                                        <button id="315B" onclick="setText(this);" value="315B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">315B</button>
                                                        <button id="316B" onclick="setText(this);" value="316B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">316B</button>
                                                        <button id="317B" onclick="setText(this);" value="317B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">317B</button>
                                                    </div>    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle">4</td>
                                            <td style="padding-left:0px; padding-right:0px;">                                        
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="401A" onclick="setText(this);" value="401A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">401A</button>
                                                        <button id="402A" onclick="setText(this);" value="402A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">402A</button>
                                                        <button id="403A" onclick="setText(this);" value="403A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">403A</button>
                                                        <button id="404A" onclick="setText(this);" value="404A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">404A</button>
                                                        <button id="405A" onclick="setText(this);" value="405A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">405A</button>
                                                        <button id="406A" onclick="setText(this);" value="406A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">406A</button>
                                                        <button id="407A" onclick="setText(this);" value="407A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">407A</button>
                                                        <button id="408A" onclick="setText(this);" value="408A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">408A</button>
                                                        <button id="409A" onclick="setText(this);" value="409A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">409A</button>
                                                        <button id="410A" onclick="setText(this);" value="410A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">410A</button>
                                                        <button id="411A" onclick="setText(this);" value="411A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">411A</button>
                                                        <button id="412A" onclick="setText(this);" value="412A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">412A</button>
                                                        <button id="413A" onclick="setText(this);" value="413A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">413A</button>
                                                        <button id="414A" onclick="setText(this);" value="414A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">414A</button>
                                                        <button id="415A" onclick="setText(this);" value="415A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">415A</button>
                                                        <button id="416A" onclick="setText(this);" value="416A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">416A</button>
                                                        <button id="417A" onclick="setText(this);" value="417A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">417A</button>
                                                    </div>
                                                </div>
                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button id="401B" onclick="setText(this);" value="401B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">401B</button>
                                                        <button id="402B" onclick="setText(this);" value="402B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">402B</button>
                                                        <button id="403B" onclick="setText(this);" value="403B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">403B</button>
                                                        <button id="404B" onclick="setText(this);" value="404B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">404B</button>
                                                        <button id="405B" onclick="setText(this);" value="405B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">405B</button>
                                                        <button id="406B" onclick="setText(this);" value="406B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">406B</button>
                                                        <button id="407B" onclick="setText(this);" value="407B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">407B</button>
                                                        <button id="408B" onclick="setText(this);" value="408B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">408B</button>
                                                        <button id="409B" onclick="setText(this);" value="409B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">409B</button>
                                                        <button id="410B" onclick="setText(this);" value="410B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">410B</button>
                                                        <button id="411B" onclick="setText(this);" value="411B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">411B</button>
                                                        <button id="412B" onclick="setText(this);" value="412B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">412B</button>
                                                        <button id="413B" onclick="setText(this);" value="413B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">413B</button>
                                                        <button id="414B" onclick="setText(this);" value="414B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">414B</button>
                                                        <button id="415B" onclick="setText(this);" value="415B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">415B</button>
                                                        <button id="416B" onclick="setText(this);" value="416B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">416B</button>
                                                        <button id="417B" onclick="setText(this);" value="417B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">417B</button>
                                                    </div>    
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="roomNo">You picked room number</label>
                                                    <p id="roomNo"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type='button' id="submit_btn" onclick="submitRoomNo();" class="btn btn-primary mt-5 waves-effect" style="float:right;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>                        
    </body>
    <script src="../js/async_connect.js"></script>

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
    </script>
</html>