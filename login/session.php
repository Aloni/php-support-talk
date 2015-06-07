<?php
/****
Includes in other pages the next session script for login validation:
    require_once('login/session.php');
***/

session_start();

if(!isset($_SESSION['user_type'])){
    header("location: login/login.php");
}



?>
