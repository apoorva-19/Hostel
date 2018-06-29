<?php
    require_once('base.php');
?>

<!DOCTYPE html>
<html>
    <script>
        window.onload = function() {
            document.getElementById("menu_home").classList.add("active");
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
                            <div class="number count-to" data-from="0" data-to="4" data-speed="500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block-header">
                <h2>NOTICES</h2>
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
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
                </div> 

            </div>
            <div class="row clearfix">

            </div>
        </div>
    </section>
<body>

</html>