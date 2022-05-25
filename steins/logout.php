<?php
// Initialize the session
session_start();
 
unset($_SESSION["username"]);
unset($_SESSION["loggedin"]);
 
// Redirect to login page
header("location: home.php");
?>