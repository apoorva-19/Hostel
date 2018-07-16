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
    require_once('base.php');
?>

<!DOCTYPE html>
<html>

<body>
    <script>
        window.onload = function() {
            document.getElementById("menu_checklist").classList.add("active");
        }
    </script>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <form method="POST" action="#">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Facility</th>
                                        <th>During Allotment</th>
                                        <th>During Vacating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Study Table</td>
                                        <td><input type="checkbox" id="study_table_allot"/> <label for="study_table_allot"></label></td>
                                        <td><input type="checkbox" id="study_table_vacate"/> <label for="study_table_vacate"></label></td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Chair</td>
                                        <td><input type="checkbox" id="chair_allot"/> <label for="chair_allot"></label></td></td>
                                        <td><input type="checkbox" id="chair_vacate"/> <label for="chair_vacate"></label></td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Cupboard</td>
                                        <td><input type="checkbox" id="cupboard_allot"/> <label for="cupboard_allot"></label></td></td>
                                        <td><input type="checkbox" id="cupboard_vacate"/> <label for="cupboard_vacate"></label></td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Cot</td>
                                        <td><input type="checkbox" id="cot_allot"/> <label for="cot_allot"></label></td></td>
                                        <td><input type="checkbox" id="cot_vacate"/> <label for="cot_vacate"></label></td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Ceiling Fan</td>
                                        <td><input type="checkbox" id="ceiling_fan_allot"/> <label for="ceiling_fan_allot"></label></td></td>
                                        <td><input type="checkbox" id="ceiling_fan_vacate"/> <label for="ceiling_fan_vacate"></label></td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Tubelights</td>
                                        <td><input type="checkbox" id="tubelights_allot"/> <label for="tubelights_allot"></label></td></td>
                                        <td><input type="checkbox" id="tubelights_vacate"/> <label for="tubelights_vacate"></label></td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Wall Switches</td>
                                        <td><input type="checkbox" id="wall_switches_allot"/> <label for="wall_switches_allot"></label></td></td>
                                        <td><input type="checkbox" id="wall_switches_vacate"/> <label for="wall_switches_vacate"></label></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Table Lamp</td>
                                        <td><input type="checkbox" id="table_lamp_allot"/> <label for="table_lamp_allot"></td>
                                        <td><input type="checkbox" id="table_lamp_vacate"/> <label for="table_lamp_vacate"></label></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>Mirror</td>
                                        <td><input type="checkbox" id="mirror_allot"/> <label for="mirror_allot"></td>
                                        <td><input type="checkbox" id="mirror_vacate"/> <label for="mirror_vacate"></label></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td>Wall Painting</td>
                                        <td><input type="checkbox" id="wall_painting_allot"/> <label for="wall_painting_allot"></td>
                                        <td><input type="checkbox" id="wall_painting_vacate"/> <label for="wall_painting_vacate"></label></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td>Window Curtains</td>
                                        <td><input type="checkbox" id="window_curtains_allot"/> <label for="window_curtains_allot"></td>
                                        <td><input type="checkbox" id="window_curtains_vacate"/> <label for="window_curtains_vacate"></label></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">12</th>
                                        <td>Washroom Accesories</td>
                                        <td><input type="checkbox" id="washroom_accesories_allot"/> <label for="washroom_accesories_allot"></td>
                                        <td><input type="checkbox" id="washroom_accesories_vacate"/> <label for="washroom_accesories_vacate"></label></td>
                                    </tr>
        
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </section>
</body>
</html>
