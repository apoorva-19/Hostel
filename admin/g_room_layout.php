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
    require_once('../connect.php');
    require_once('base.php');
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
        $(document).ready(function() {
            $("#girls_hostel_layout").addClass("active");
        }); 
    </script>
<body>
    <script>
        window.onload = function() {
            httpGetAsync("g_room_status.php", roomStatusCallback);
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
    </script>
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
                                        <td><h4>#</h4></td>
                                        <td><h4>A Wing</h4></td>
                                        <td><h4>B Wing</h4></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle">G</td>
                                        <td style="padding-left:0px; padding-right:0px;">
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="001A"  value="001A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">001A</button>
                                                    <button id="002A"  value="002A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">002A</button>
                                                    <button id="003A"  value="003A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">003A</button>
                                                    <button id="004A"  value="004A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">004A</button>
                                                    <button id="005A"  value="005A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">005A</button>
                                                    <button id="006A"  value="006A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">006A</button>
                                                    <button id="007A"  value="007A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">007A</button>
                                                    <button id="008A"  value="008A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">008A</button>
                                                    <button id="009A"  value="009A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">009A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button  id="001B" value="001B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">001B</button>
                                                    <button  id="002B" value="002B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">002B</button>
                                                    <button  id="003B" value="003B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">003B</button>
                                                    <button  id="004B" value="004B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">004B</button>
                                                    <button  id="005B" value="005B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">005B</button>
                                                    <button  id="006B" value="006B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">006B</button>
                                                    <button  id="007B" value="007B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">007B</button>
                                                    <button  id="008B" value="008B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">008B</button>
                                                    <button  id="009B" value="009B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">009B</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding-left:0px; padding-right:0px;">
                                            <div class="" role="" aria-label="Second group">
                                                <p>Warden Office</p>
                                            </div>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td style="vertical-align:middle">1</td>
                                        <td style="padding-left:0px; padding-right:0px;">
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button  id="101A" value="101A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">101A</button>
                                                    <button  id="102A" value="102A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">102A</button>
                                                    <button  id="103A" value="103A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">103A</button>
                                                    <button  id="104A" value="104A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">104A</button>
                                                    <button  id="105A" value="105A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">105A</button>
                                                    <button  id="106A" value="106A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">106A</button>
                                                    <button  id="107A" value="107A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">107A</button>
                                                    <button  id="108A" value="108A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">108A</button>
                                                    <button  id="109A" value="109A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">109A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button  id="101B" value="101B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">101B</button>
                                                    <button  id="102B" value="102B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">102B</button>
                                                    <button  id="103B" value="103B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">103B</button>
                                                    <button  id="104B" value="104B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">104B</button>
                                                    <button  id="105B" value="105B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">105B</button>
                                                    <button  id="106B" value="106B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">106B</button>
                                                    <button  id="107B" value="107B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">107B</button>
                                                    <button  id="108B" value="108B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">108B</button>
                                                    <button  id="109B" value="109B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">109B</button>
                                                </div>    
                                            </div>
                                        </td>
                                        <td style="padding-left:0px; padding-right:0px;">
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                <button  id="110A" value="110A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">110A</button>
                                                <button  id="111A" value="111A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">111A</button>
                                                <button  id="112A" value="112A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">112A</button>
                                                <button  id="113A" value="113A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">113A</button>
                                                <button  id="114A" value="114A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">114A</button>
                                                <button  id="115A" value="115A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">115A</button>
                                                <button  id="116A" value="116A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">116A</button>
                                                <button  id="117A" value="117A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">117A</button>
                                                <button  id="118A" value="118A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">118A</button>
                                                <button  id="119A" value="119A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">119A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                    <button id="110B"  value="110B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">110B</button>
                                                    <button id="111B"  value="111B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">111B</button>
                                                    <button id="112B"  value="112B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">112B</button>
                                                    <button id="113B"  value="113B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">113B</button>
                                                    <button id="114B"  value="114B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">114B</button>
                                                    <button id="115B"  value="115B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">115B</button>
                                                    <button id="116B"  value="116B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">116B</button>
                                                    <button id="117B"  value="117B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">117B</button>
                                                    <button id="118B"  value="118B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">118B</button>
                                                    <button id="119B"  value="119B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">119B</button>
                                                </div>
                                            </div> 
                                        </td>    
                                    </tr>  
                                    <tr>
                                        <td style="vertical-align:middle">2</td> 
                                        <td style="padding-left:0px; padding-right:0px; margin:0px;">
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="201A"  value="201A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">201A</button>
                                                    <button id="202A"  value="202A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">202A</button>
                                                    <button id="203A"  value="203A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">203A</button>
                                                    <button id="204A"  value="204A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">204A</button>
                                                    <button id="205A"  value="205A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">205A</button>
                                                    <button id="206A"  value="206A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">206A</button>
                                                    <button id="207A"  value="207A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">207A</button>
                                                    <button id="208A"  value="208A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">208A</button>
                                                    <button id="209A"  value="209A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">209A</button>
                                                </div>    
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="201B"  value="201B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">201B</button>
                                                    <button id="202B"  value="202B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">202B</button>
                                                    <button id="203B"  value="203B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">203B</button>
                                                    <button id="204B"  value="204B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">204B</button>
                                                    <button id="205B"  value="205B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">205B</button>
                                                    <button id="206B"  value="206B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">206B</button>
                                                    <button id="207B"  value="207B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">207B</button>
                                                    <button id="208B" onclick="setText(s);" value="208B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">208B</button>
                                                    <button id="209B"  value="209B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">209B</button>
                                                </div>    
                                            </div>
                                        </td>
                                        <td style="padding-left:0px; padding-right:0px; margin:0px;">
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                <button id="210A"  value="210A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">210A</button>
                                                <button id="211A"  value="211A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">211A</button>
                                                <button id="212A"  value="212A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">212A</button>
                                                <button id="213A"  value="213A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">213A</button>
                                                <button id="214A"  value="214A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">214A</button>
                                                <button id="215A"  value="215A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">215A</button>
                                                <button id="216A"  value="216A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">216A</button>
                                                <button id="217A"  value="217A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">217A</button>
                                                <button id="218A"  value="218A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">218A</button>
                                                <button id="219A"  value="219A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">219A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                    <button id="210B"  value="210B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">210B</button>
                                                    <button id="211B"  value="211B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">211B</button>
                                                    <button id="212B"  value="212B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">212B</button>
                                                    <button id="213B"  value="213B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">213B</button>
                                                    <button id="214B"  value="214B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">214B</button>
                                                    <button id="215B"  value="215B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">215B</button>
                                                    <button id="216B"  value="216B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">216B</button>
                                                    <button id="217B"  value="217B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">217B</button>
                                                    <button id="218B"  value="218B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">218B</button>
                                                    <button id="219B"  value="219B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">219B</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle">3</td> 
                                        <td style="padding-left:0px; padding-right:0px;margin:0px;">
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="301A"  value="301A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">301A</button>
                                                    <button id="302A"  value="302A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">302A</button>
                                                    <button id="303A"  value="303A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">303A</button>
                                                    <button id="304A"  value="304A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">304A</button>
                                                    <button id="305A"  value="305A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">305A</button>
                                                    <button id="306A"  value="306A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">306A</button>
                                                    <button id="307A"  value="307A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">307A</button>
                                                    <button id="308A"  value="308A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">308A</button>
                                                    <button id="309A"  value="309A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">309A</button>
                                                </div>    
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                <button id="301B"   value="301B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">301B</button>
                                                <button id="302B"   value="302B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">302B</button>
                                                <button id="303B"   value="303B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">303B</button>
                                                <button id="304B"   value="304B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">304B</button>
                                                <button id="305B"   value="305B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">305B</button>
                                                <button id="306B"   value="306B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">306B</button>
                                                <button id="307B"   value="307B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">307B</button>
                                                <button id="308B"   value="308B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">308B</button>
                                                <button id="309B"   value="309B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">309B</button>
                                                </div>    
                                            </div>
                                        </td>
                                        <td style="padding-left:0px; padding-right:0px;margin:0px;">
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                    <button id="310A"  value="310A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">310A</button>
                                                    <button id="311A"  value="311A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">311A</button>
                                                    <button id="312A"  value="312A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">312A</button>
                                                    <button id="313A"  value="313A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">313A</button>
                                                    <button id="314A"  value="314A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">314A</button>
                                                    <button id="315A"  value="315A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">315A</button>
                                                    <button id="316A"  value="316A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">316A</button>
                                                    <button id="317A"  value="317A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">317A</button>
                                                    <button id="318A"  value="318A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">318A</button>
                                                    <button id="319A"  value="319A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">319A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                    <button id="310B"   value="310B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">310B</button>
                                                    <button id="311B"   value="311B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">311B</button>
                                                    <button id="312B"   value="312B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">312B</button>
                                                    <button id="313B"   value="313B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">313B</button>
                                                    <button id="314B"   value="314B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">314B</button>
                                                    <button id="315B"   value="315B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">315B</button>
                                                    <button id="316B"   value="316B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">316B</button>
                                                    <button id="317B"   value="317B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">317B</button>
                                                    <button id="318B"   value="318B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">318B</button>
                                                    <button id="319B"   value="319B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">319B</button>
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
                                                    <button id="401A"   value="401A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">401A</button>
                                                    <button id="402A"   value="402A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">402A</button>
                                                    <button id="403A"   value="403A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">403A</button>
                                                    <button id="404A"   value="404A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">404A</button>
                                                    <button id="405A"   value="405A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">405A</button>
                                                    <button id="406A"   value="406A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">406A</button>
                                                    <button id="407A"   value="407A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">407A</button>
                                                    <button id="408A"   value="408A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">408A</button>
                                                    <button id="409A"   value="409A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">409A</button>
                                                    <button id="410A"   value="410A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">410A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                <button id="401B"   value="401B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">401B</button>
                                                <button id="402B"   value="402B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">402B</button>
                                                <button id="403B"   value="403B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">403B</button>
                                                <button id="404B"   value="404B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">404B</button>
                                                <button id="405B"   value="405B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">405B</button>
                                                <button id="406B"   value="406B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">406B</button>
                                                <button id="407B"   value="407B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">407B</button>
                                                <button id="408B"   value="408B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">408B</button>
                                                <button id="409B"   value="409B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">409B</button>
                                                <button id="410B"   value="410B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">410B</button>
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
                                                    <button id="501A"   value="501A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">501A</button>
                                                    <button id="502A"   value="502A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">502A</button>
                                                    <button id="503A"   value="503A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">503A</button>
                                                    <button id="504A"   value="504A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">504A</button>
                                                    <button id="505A"   value="505A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">505A</button>
                                                    <button id="506A"   value="506A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">506A</button>
                                                    <button id="507A"   value="507A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">507A</button>
                                                    <button id="508A"   value="508A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">508A</button>
                                                    <button id="509A"   value="509A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">509A</button>
                                                    <button id="510A"   value="510A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">510A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                <button id="501B"   value="501B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">501B</button>
                                                <button id="502B"   value="502B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">502B</button>
                                                <button id="503B"   value="503B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">503B</button>
                                                <button id="504B"   value="504B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">504B</button>
                                                <button id="505B"   value="505B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">505B</button>
                                                <button id="506B"   value="506B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">506B</button>
                                                <button id="507B"   value="507B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">507B</button>
                                                <button id="508B"   value="508B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">508B</button>
                                                <button id="509B"   value="509B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">509B</button>
                                                <button id="510B"   value="510B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">510B</button>
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
                                                    <button id="601A"   value="601A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">601A</button>
                                                    <button id="602A"   value="602A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">602A</button>
                                                    <button id="603A"   value="603A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">603A</button>
                                                    <button id="604A"   value="604A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">604A</button>
                                                    <button id="605A"   value="605A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">605A</button>
                                                    <button id="606A"   value="606A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">606A</button>
                                                    <button id="607A"   value="607A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">607A</button>
                                                    <button id="608A"   value="608A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">608A</button>
                                                    <button id="609A"   value="609A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">609A</button>
                                                    <button id="610A"   value="610A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">610A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                <button id="601B"   value="601B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">601B</button>
                                                <button id="602B"   value="602B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">602B</button>
                                                <button id="603B"   value="603B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">603B</button>
                                                <button id="604B"   value="604B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">604B</button>
                                                <button id="605B"   value="605B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">605B</button>
                                                <button id="606B"   value="606B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">606B</button>
                                                <button id="607B"   value="607B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">607B</button>
                                                <button id="608B"   value="608B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">608B</button>
                                                <button id="609B"   value="609B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">609B</button>
                                                <button id="610B"   value="610B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">610B</button>
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
                                                    <button id="701A"   value="701A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">701A</button>
                                                    <button id="702A"   value="702A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">702A</button>
                                                    <button id="703A"   value="703A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">703A</button>
                                                    <button id="704A"   value="704A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">704A</button>
                                                    <button id="705A"   value="705A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">705A</button>
                                                    <button id="706A"   value="706A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">706A</button>
                                                    <button id="707A"   value="707A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">707A</button>
                                                    <button id="708A"   value="708A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">708A</button>
                                                    <button id="709A"   value="709A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">709A</button>
                                                    <button id="710A"   value="710A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">710A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                <button id="701B"   value="701B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">701B</button>
                                                <button id="702B"   value="702B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">702B</button>
                                                <button id="703B"   value="703B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">703B</button>
                                                <button id="704B"   value="704B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">704B</button>
                                                <button id="705B"   value="705B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">705B</button>
                                                <button id="706B"   value="706B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">706B</button>
                                                <button id="707B"   value="707B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">707B</button>
                                                <button id="708B"   value="708B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">708B</button>
                                                <button id="709B"   value="709B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">709B</button>
                                                <button id="710B"   value="710B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">710B</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>                        
</body>