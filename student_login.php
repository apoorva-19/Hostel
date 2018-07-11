<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['studentUsername']) && isset($_POST['studentPassword']))
    {
        if((!filter_input(INPUT_POST, 'studentUsername', FILTER_SANITIZE_STRING) === false) || (!filter_input(INPUT_POST, 'studentPassword', FILTER_SANITIZE_STRING) === false))
        {
            // Send error message saying invalid input found and exit
            $errorMessage = "Invalid input entered";
        }
        
    }

?>