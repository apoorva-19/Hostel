<?php
    session_start();
    if(!($_SESSION["user"] === "g_warden"))
    {
        header("Location:../404.html");
        exit;
    }
    require_once('base.php');
    require_once('../connect.php');
?>

<!DOCTYPE html>
<html>

<body>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-light-green ">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">VACANT ROOMS</div>
                            <div class="number count-to" data-from="0" data-to="4" data-speed="500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-brown ">
                            <i class="material-icons">room</i>
                        </div>
                        <div class="content">
                            <div class="text">RESERVED ROOMS</div>
                            <div class="number count-to" data-from="0" data-to="4" data-speed="500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-grey ">
                            <i class="material-icons">bookmark</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL ROOMS</div>
                            <div class="number count-to" data-from="0" data-to="4" data-speed="500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-green ">
                            <i class="material-icons">person_pin</i>
                        </div>
                        <div class="content">
                            <div class="text">PRESENT</div>
                            <div class="number count-to" data-from="0" data-to="4" data-speed="500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-blue-grey ">
                            <i class="material-icons">directions_run</i>
                        </div>
                        <div class="content">
                            <div class="text">NIGHT OUT</div>
                            <div class="number count-to" data-from="0" data-to="4" data-speed="500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon  bg-purple ">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL STRENGTH</div>
                            <div class="number count-to" data-from="0" data-to="4" data-speed="500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <form method="POST" action="#">
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>New Students Information</h2>
                      </div>
                      <div class="body table-responsive">
                          <table class="table table-condensed">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Registernation Number</th>
                                      <th>Email Id</th>
                                      <th>Room Number</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $students="SELECT * FROM `New_Registerations` WHERE `Reg_Date` = '".date("Y-m-d")."';";
                                    if($result = mysqli_query($connect, $students))
                                    {
                                        $cnt=1;
                                        while($row = $result->fetch_assoc())
                                        {
                                          echo "<tr>
                                                  <th scope=\"row\">".$cnt."</th>
                                                  <td>".$row['Name']."</td>
                                                  <td>".$row['MIS']."</td>
                                                  <td>".$row['Email_Id']."</td>";
                                                  if($row['Room_No'] == 0)
                                                  {
                                                    echo "<td><button type='button' id='allocate' name='allocate' value='".$row['MIS']."' class='form-contol btn btn-primary waves-effect mt-5'>Allocate Room</button></td>";
                                                  }
                                                  else  
                                                    echo "<td>".$row['Room_No']."</td>";
                                          echo  "</tr>";
                                        }
                                    }
                                    else
                                      echo 'too bad';
                                  ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
        </form>
    </section>
    <script type="text/javascript">
        document.getElementById("allocate").onclick = function () {
            location.href = "layout.php";
        };
    </script>
</body>

</html>