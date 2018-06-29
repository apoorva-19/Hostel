<?php
    require_once('connect.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = test_input($_POST["username"]);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $verify = 'SELECT `Password` FROM Staff_Login WHERE `Username` = \''.$username.'\';';
        $v_output = $connect->query($verify);
	    $v_pass = $v_output->fetch_assoc();
        $v_pwd = $v_pass["Password"];
        
    }
?>