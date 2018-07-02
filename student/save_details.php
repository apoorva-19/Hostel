<?php
require_once('../connect.php');
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
        $f_name = test_input($_POST["father_name"]);
        $m_name = test_input($_POST["mother_name"]);
        $f_occupation = test_input($_POST["f_occupation"]);
        $m_occupation = test_input($_POST["m_occupation"]);
        $f_designation = test_input($_POST["f_designation"]);
        $m_designation = test_input($_POST["m_designation"]);
        $f_mob_no = test_input($_POST["f_mob_no"]);
        $m_mob_no = test_input($_POST["m_mob_no"]);
        $f_email = test_input($_POST["f_email"]);
        $m_email = test_input($_POST["m_email"]);
        $prem_add = test_input($_POST["prem_add"]);
        $local_guardian = test_input($_POST["local_guardian"]);
        $relation = test_input($_POST["relation"]);
        $guardian_add = test_input($_POST["guardian_add"]);
        $g_contact = test_input($_POST["g_contact"]);
        $alt_g_contact = test_input($_POST["alt_g_contact"]);
        $mis = test_input($_SESSION["user"]);
        
        $sql = 'UPDATE `Hostelite` SET `Father_Name`=?,`Mother_Name`=?,`Permanent_Add`=?,`F_Contact`=?,`M_Contact`=?,`F_Email`=?,`M_Email`=?, `F_Occupation`=?, `M_Occupation`=?, `F_Designation`=?, `M_Designation`=? WHERE `MIS` = ?;';
        if(!($basic_details = $mysqli->prepare($sql))){
            error_log('Prepare failed for basic details in save_details.php: ('.$mysqli->errno.') '.$mysqli->error);
            echo 'An error occured while processing your request. Please contact the administrator or try again later.';
            die(header("HTTP/1.1 500 Internal Server Error"));
        }
        if(!($basic_details->bind_param("sssiisssss", $f_name, $m_name, $prem_add, $f_mob_no, $m_mob_no, $f_email, $m_email, $f_occupation, $m_occupation, $f_designation, $m_designation,$mis)))
        {
            error_log('Binding failed for basic details in save_details.php: ('.$mysqli->errno.') '.$mysqli->error);
            echo 'An error occured while processing your request. Please contact the administrator or try again later.';
            die(header("HTTP/1.1 500 Internal Server Error"));
        }
        if(!($basic_details->execute()))
        {
            error_log('Execution failed for basic details in save_details.php: ('.$mysqli->errno.') '.$mysqli->error);
            echo 'An error occured while processing your request. Please contact the administrator or try again later.';
            die(header("HTTP/1.1 500 Internal Server Error"));
        }

        $sql = 'INSERT INTO `Guardian`(`MIS`, `Name`, `Relation`, `Permanent_Add`, `G_Contact`, `Alt_G_Contact`) VALUES (?,?,?,?,?,?);';
        if(!($guardian_details = $mysqli->prepare($sql))){
            error_log('Prepare failed for guardian details in save_details.php: ('.$mysqli->errno.') '.$mysqli->error);
            echo 'An error occured while processing your request. Please contact the administrator or try again later.';
            die(header("HTTP/1.1 500 Internal Server Error"));
        }
        if(!($guardian_details->bind_param("ssssii",$mis,$local_guardian, $relation, $guardian_add, $g_contact, $alt_g_contact)))
        {
            error_log('Binding failed for guardian details in save_details.php: ('.$mysqli->errno.') '.$mysqli->error);
            echo 'An error occured while processing your request. Please contact the administrator or try again later.';
            die(header("HTTP/1.1 500 Internal Server Error"));
        }
        if(!($guardian_details->execute()))
        {
            error_log('Execution failed for basic details in save_details.php: ('.$mysqli->errno.') '.$mysqli->error);
            echo 'An error occured while processing your request. Please contact the administrator or try again later.';
            die(header("HTTP/1.1 500 Internal Server Error"));
        }
        echo 'Details have been saved sucessfully';
        die(header("HTTP/1.1 200 OK"));
    }
}
function validateInput()
{   
    $valid = true;
    if(!(isset($_POST["father_name"]) && $_POST["father_name"] != "" && preg_match('/^[a-zA-Z\s]{1,}[\.]{0,1}[a-zA-Z\s]{0,}$/',$_POST["father_name"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["mother_name"]) && $_POST["mother_name"] != "" && preg_match('/^[a-zA-Z\s]{1,}[\.]{0,1}[a-zA-Z\s]{0,}$/',$_POST["mother_name"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["f_occupation"]) && $_POST["f_occupation"] != "" && preg_match('/^[a-zA-Z\s]{1,}[\.]{0,1}[a-zA-Z\s]{0,}$/',$_POST["f_occupation"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["m_occupation"]) && $_POST["m_occupation"] != "" && preg_match('/^[a-zA-Z\s]{1,}[\.]{0,1}[a-zA-Z\s]{0,}$/',$_POST["m_occupation"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["f_designation"]) && $_POST["f_designation"] != "" && preg_match('/^[a-zA-Z\s]{1,}[\.]{0,1}[a-zA-Z\s]{0,}$/',$_POST["f_designation"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["m_designation"]) && $_POST["m_designation"] != "" && preg_match('/^[a-zA-Z\s]{1,}[\.]{0,1}[a-zA-Z\s]{0,}$/',$_POST["m_designation"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["f_mob_no"]) && $_POST["f_mob_no"] != "" && preg_match('/^[6789]{1}[0-9]{9}+$/', $_POST["f_mob_no"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["m_mob_no"]) && $_POST["m_mob_no"] != "" && preg_match('/^[6789]{1}[0-9]{9}+$/', $_POST["m_mob_no"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["f_email"]) && $_POST["f_email"] != "" && filter_input(INPUT_POST, "f_email", FILTER_VALIDATE_EMAIL)))
    {
        $valid = false;
    }
    if(!(isset($_POST["m_email"]) && $_POST["m_email"] != "" && filter_input(INPUT_POST, "m_email", FILTER_VALIDATE_EMAIL)))
    {
        $valid = false;
    }
    if(!(isset($_POST["perm_add"]) && $_POST["perm_add"] != "" && preg_match('/^[#.0-9a-zA-Z\s,-]+$/',$_POST["perm_add"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["local_guardian"]) && $_POST["local_guardian"] != "" && preg_match('/^[a-zA-Z\s]{1,}[a-zA-Z\s]{0,}$/',$_POST["local_guardian"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["relation"]) && $_POST["relation"] != "" && preg_match('/^[a-zA-Z\s]{1,}[a-zA-Z\s]{0,}$/',$_POST["relation"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["guardian_add"]) && $_POST["guardian_add"] != "" && preg_match('/^[#.0-9a-zA-Z\s,-]+$/',$_POST["guardian_add"])))
    {
        $valid = false;
    }
    if(!(isset($_POST["g_contact"]) && $_POST["g_contact"] != "" && preg_match('/^[6789]{1}[0-9]{9}+$/', $_POST["g_contact"])))
    {
        $valid = false;
    }
    if(!empty($_POST["alt_g_contact"]))    
    {
        if(!(preg_match('/^[6789]{1}[0-9]{9}+$/', $_POST["alt_g_contact"]) ))
        {
            $valid = false;
        }  
    }
    return $valid;  
}
?>