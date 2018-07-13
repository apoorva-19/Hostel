<?php
    session_start();
    session_destroy();
    if(!empty($_COOKIE["user"]))
        setcookie("user", "", time() - 3600);
    header("Location:login.php");
?>