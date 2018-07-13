<?php
    session_start();
    if(empty($_SESSION["user"]))
    {
        header("Location:../404.html");
        exit;
    }
    if($_SESSION["user"] != "g_warden")
    {
        header("Location:../404.html");
        exit;
    }
    require_once('base.php');
    require_once('../connect.php');
    require_once('../convert.php');
    $errors = false;
    if(($_SERVER["REQUEST_METHOD"] == "POST"))
    {
        if(!validateInput())
        {
            echo "<script>swal({
                                title: 'Invalid data entered!',
                                text: 'Invalid data has been entered in some fields. Please check all fields and try again',
                                type: 'error'});</script>";
            $errors = true;
        }
        else
        {
            $in_time = convertDateTime(test_input($_POST["in_time"]));
            $out_time = convertDateTime(test_input($_POST["out_time"]));
            $guardian_address = test_input($_POST["guardian_address"]);
            $mis = test_input($_SESSION["user"]);
            
            $sql = "SELECT * FROM `G_Night_Permission`;";
            if(!($verify_mis = $mysqli->prepare($sql)))
            {
                //error_log('Binding failed for mis checking in night.php: ('.$mysqli->errno.') '.$mysqli->error);
                echo "<script>$(document).ready(function(){
                    swal({
                    title: 'Error',
                    text: 'Request could not be processed. We are trying to fix the error.',
                    type: 'error'
                    });
                    
                })</script>";

            }
            else
            {
                if(!($verify_mis->bind_param('s',$mis)))
                {
                    //error_log('Binding failed for mis checking in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                    echo "<script>$(document).ready(function(){
                        swal({
                        title: 'Error',
                        text: 'Request could not be processed. We are trying to fix the error.',
                        type: 'error'
                        });
                        
                    })</script>";
                }
                else
                {
                    if(!$verify_mis->execute())
                    {
                        //error_log('Execution failed for verifying student in sign_up.php: ('.$mysqli->errno.') '.$mysqli->error);
                        echo "<script>$(document).ready(function(){
                            swal({
                            title: 'Error',
                            text: 'Request could not be processed. We are trying to fix the error.',
                            type: 'error'
                            });
                            
                        })</script>";
                    }
                    else
                    {
                        $res = $verify_mis->get_result();
                        if($res->num_rows == 0)
                        {
                            echo "<script>$(document).ready(function(){
                                swal({
                                title: 'Error',
                                text: 'This MIS id has not registered for the hostel',
                                type: 'error'
                                });
                                
                            })</script>";
                        }
                        else
                        {
                            $cnt = 1;
                                echo"<table>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Room Number</th>
                                        <th>Name</th>
                                        <th>Out Time</th>
                                        <th>In Time</th>
                                        <th>Address</th>
                                        <th>Parent Contact</th>
                                        <th>Parent Consent</th>
                                        <th>Warden Consent</th>
                                    </tr>
                                    </thead>
                                    <tbody>";
                                    while($row = $res->fetch_assoc())
                                    {
                                        echo "<tr>
                                            <th scope=\"row\">".$cnt."</th>
                                            <td>".$row['Name']."</td>
                                            <td>".$row['Datetime_Out']."</td>
                                            <td>".$row['Datetime_In']."</td>
                                            <td>".$row['Address']."</td>
                                            <td>".$row['P_Contact']."</td>
                                            <td>".$row['P_Consent']."</td>";
                                            if($row['W_Consent']=='N')
                                                echo "<td><button type='button' onclick = 'consent();' class='btn btn-primary waves-effect mt-5'>Give Consent</button></td>";
                                            else
                                                echo "<td>Y<td>
                                        </tr>";
                                    }
                                    echo "</tbody>
                                </table>";
                            }
                        }
                    }
                }
            }
        }
    }
    <script>    
    function consent()
    {
        allowed = "Y";
        misID = document.getElementById('mis').value;
        postData = "consent=" + allowed + "&misID=" + misID;
        httpPostAsync('consent.php', postData, submitResult);
   
    }
    function submitResult(resultJson) {
        var JSONresult = JSON.parse(resultJson);
        if(JSONresult.result == "Permission given.")
        {
            swal({
                title: "Done!",
                text: "Permission given.",
                type: "success",
            });
        }
        else 
        {
            swal({
                title: "Error!",
                text: "Permission not granted.",
                type: "error",
                showConfirmButton: true,
                confirmButtonText: "Ok"
            }).then((result) => {
                if(result.value){
                    window.location.href="night_confirm.php";
                }
            });
        }
    }

    </script>
    function validateInput()
    {
        return true;
    }
?>
