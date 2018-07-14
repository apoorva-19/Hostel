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
            $("#boys_hostel_layout").addClass("active");
        }); 
    </script>
<body>
    <script>
        window.onload = function() {
            httpGetAsync("b_room_status.php", roomStatusCallback);
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
                                                    <button id="101A"  value="101A" type="button" class="seating-btn seating-btn seating-btn btn btn-default btn-xs waves-effect">101A</button>
                                                    <button id="102A"  value="102A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">102A</button>
                                                    <button id="103A"  value="103A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">103A</button>
                                                    <button id="104A"  value="104A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">104A</button>
                                                    <button id="105A"  value="105A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">105A</button>
                                                    <button id="106A"  value="106A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">106A</button>
                                                    <button id="107A"  value="107A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">107A</button>
                                                    <button id="108A"  value="108A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">108A</button>
                                                    <button id="109A"  value="109A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">109A</button>
                                                    <button id="110A"  value="110A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">110A</button>
                                                    <button id="111A"  value="111A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">111A</button>
                                                    <button id="112A"  value="112A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">112A</button>
                                                    <button id="113A"  value="113A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">113A</button>
                                                    <button id="114A"  value="114A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">114A</button>
                                                    <button id="115A"  value="115A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">115A</button>
                                                    <button id="116A"  value="116A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">116A</button>
                                                    <button id="117A"  value="117A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">117A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="101B"  value="101B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">101B</button>
                                                    <button id="102B"  value="102B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">102B</button>
                                                    <button id="103B"  value="103B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">103B</button>
                                                    <button id="104B"  value="104B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">104B</button>
                                                    <button id="105B"  value="105B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">105B</button>
                                                    <button id="106B"  value="106B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">106B</button>
                                                    <button id="107B"  value="107B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">107B</button>
                                                    <button id="108B"  value="108B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">108B</button>
                                                    <button id="109B"  value="109B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">109B</button>
                                                    <button id="110B"  value="---" type="button" class="seating-btn btn btn-default btn-xs waves-effect" disabled>-------</button>
                                                    <button id="111B"  value="111B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">111B</button>
                                                    <button id="112B"  value="112B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">112B</button>
                                                    <button id="113B"  value="113B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">113B</button>
                                                    <button id="114B"  value="114B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">114B</button>
                                                    <button id="115B"  value="115B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">115B</button>
                                                    <button id="116B"  value="116B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">116B</button>
                                                    <button id="117B"  value="117B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">117B</button>
                                                </div>    
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle">2</td>
                                        <td style="padding-left:0px; padding-right:0px;">                                        
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
                                                    <button id="210A"  value="210A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">210A</button>
                                                    <button id="211A"  value="211A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">211A</button>
                                                    <button id="212A"  value="212A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">212A</button>
                                                    <button id="213A"  value="213A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">213A</button>
                                                    <button id="214A"  value="214A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">214A</button>
                                                    <button id="215A"  value="215A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">215A</button>
                                                    <button id="216A"  value="216A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">216A</button>
                                                    <button id="217A"  value="217A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">217A</button>
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
                                                    <button id="208B"  value="208B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">208B</button>
                                                    <button id="209B"  value="209B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">209B</button>
                                                    <button id="210B"  value="210B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">210B</button>
                                                    <button id="211B"  value="211B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">211B</button>
                                                    <button id="212B"  value="212B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">212B</button>
                                                    <button id="213B"  value="213B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">213B</button>
                                                    <button id="214B"  value="214B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">214B</button>
                                                    <button id="215B"  value="215B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">215B</button>
                                                    <button id="216B"  value="216B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">216B</button>
                                                    <button id="217B"  value="217B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">217B</button>
                                                </div>    
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle">3</td>
                                        <td style="padding-left:0px; padding-right:0px;">                                        
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
                                                    <button id="310A"  value="310A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">310A</button>
                                                    <button id="311A"  value="311A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">311A</button>
                                                    <button id="312A"  value="312A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">312A</button>
                                                    <button id="313A"  value="313A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">313A</button>
                                                    <button id="314A"  value="314A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">314A</button>
                                                    <button id="315A"  value="315A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">315A</button>
                                                    <button id="316A"  value="316A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">316A</button>
                                                    <button id="317A"  value="317A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">317A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="301B"  value="301B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">301B</button>
                                                    <button id="302B"  value="302B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">302B</button>
                                                    <button id="303B"  value="303B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">303B</button>
                                                    <button id="304B"  value="304B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">304B</button>
                                                    <button id="305B"  value="305B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">305B</button>
                                                    <button id="306B"  value="306B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">306B</button>
                                                    <button id="307B"  value="307B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">307B</button>
                                                    <button id="308B"  value="308B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">308B</button>
                                                    <button id="309B"  value="309B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">309B</button>
                                                    <button id="310B"  value="310B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">310B</button>
                                                    <button id="311B"  value="311B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">311B</button>
                                                    <button id="312B"  value="312B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">312B</button>
                                                    <button id="313B"  value="313B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">313B</button>
                                                    <button id="314B"  value="314B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">314B</button>
                                                    <button id="315B"  value="315B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">315B</button>
                                                    <button id="316B"  value="316B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">316B</button>
                                                    <button id="317B"  value="317B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">317B</button>
                                                </div>    
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle">4</td>
                                        <td style="padding-left:0px; padding-right:0px;">                                        
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="401A"  value="401A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">401A</button>
                                                    <button id="402A"  value="402A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">402A</button>
                                                    <button id="403A"  value="403A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">403A</button>
                                                    <button id="404A"  value="404A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">404A</button>
                                                    <button id="405A"  value="405A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">405A</button>
                                                    <button id="406A"  value="406A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">406A</button>
                                                    <button id="407A"  value="407A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">407A</button>
                                                    <button id="408A"  value="408A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">408A</button>
                                                    <button id="409A"  value="409A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">409A</button>
                                                    <button id="410A"  value="410A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">410A</button>
                                                    <button id="411A"  value="411A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">411A</button>
                                                    <button id="412A"  value="412A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">412A</button>
                                                    <button id="413A"  value="413A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">413A</button>
                                                    <button id="414A"  value="414A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">414A</button>
                                                    <button id="415A"  value="415A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">415A</button>
                                                    <button id="416A"  value="416A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">416A</button>
                                                    <button id="417A"  value="417A" type="button" class="seating-btn btn btn-default btn-xs waves-effect">417A</button>
                                                </div>
                                            </div>
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button id="401B"  value="401B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">401B</button>
                                                    <button id="402B"  value="402B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">402B</button>
                                                    <button id="403B"  value="403B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">403B</button>
                                                    <button id="404B"  value="404B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">404B</button>
                                                    <button id="405B"  value="405B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">405B</button>
                                                    <button id="406B"  value="406B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">406B</button>
                                                    <button id="407B"  value="407B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">407B</button>
                                                    <button id="408B"  value="408B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">408B</button>
                                                    <button id="409B"  value="409B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">409B</button>
                                                    <button id="410B"  value="410B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">410B</button>
                                                    <button id="411B"  value="411B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">411B</button>
                                                    <button id="412B"  value="412B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">412B</button>
                                                    <button id="413B"  value="413B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">413B</button>
                                                    <button id="414B"  value="414B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">414B</button>
                                                    <button id="415B"  value="415B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">415B</button>
                                                    <button id="416B"  value="416B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">416B</button>
                                                    <button id="417B"  value="417B" type="button" class="seating-btn btn btn-default btn-xs waves-effect">417B</button>
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