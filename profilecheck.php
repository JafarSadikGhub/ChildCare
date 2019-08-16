<?php
require_once "connection.php";
session_start();
//$_SESSION['username']
if(!isset($_SESSION['username']))
{
        header("location: login_cen.php");
}
$username = $_SESSION['username'];

    $getquery=mysqli_query($conn, "SELECT * FROM center WHERE username = '$username'");
    while($rows=mysqli_fetch_assoc($getquery))
    {
    $cenname=$rows['cenname'];
    $username=$rows['username'];
    $ownername=$rows['name'];

    echo $cenname . '<br/>' . '<br/>' . $username . '<br/>' . '<br/>' . $ownername . '<hr size="3"/>';
    }
    ?>
