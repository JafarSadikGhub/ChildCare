<?php
// Initialize the session

session_start();


                if(isset($_SESSION['name']))
                {
                unset($_SESSION['name']);
                }
                echo '<h1>You have been successfully logout</h1>';
// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: login_cen.php");
exit;
?>
