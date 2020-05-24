<?php
require_once 'dbconnect.php';

session_start();
if (!isset($_SESSION['users'])) {
 header( "Location: home.php");
} else if(isset($_SESSION[ 'users'])!="") {
 header("Location: home.php");
}

if  (isset($_GET['logout'])) {
 unset($_SESSION['users']);
 unset($_SESSION['admin']);
 session_unset();
 session_destroy();
 header("Location: login.php");
 exit;
}
?>