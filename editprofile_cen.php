<?php
require_once("connection.php");
//require_once("signup_cen.php");
session_start();

if(isset($_POST["update"]))
{
  $updateUser= "UPDATE center SET
      flat= '$_POST[flat]',
      house= '$_POST[house]',
      road= '$_POST[road]',
      area= '$_POST[area]',
      city= '$_POST[city]',
      zip= '$_POST[zip]',
      phone= '$_POST[phone]'
    where username= '$_SESSION[username]'";
    $query=mysqli_query($conn, $updateUser);
    $sqlSelect = "SELECT * FROM center
    WHERE username = '$_SESSION[username]'";
    $records=mysqli_query($conn, $sqlSelect);
    $count = mysqli_num_rows($records);

    if($count==1)
    {
      $field=mysqli_fetch_array($records);
      $_SESSION['flat']=$_field['flat'];
      $_SESSION['house']=$_field['house'];
      $_SESSION['road']=$_field['road'];
      $_SESSION['area']=$_field['area'];
      $_SESSION['city']=$_field['city'];
      $_SESSION['zip']=$_field['zip'];
      $_SESSION['phone']=$_field['phone'];

    	header('Location: userprofile_cen.php');

    }
    else {
      echo "Something Went wrong, please try again in a while...";
    }


}

?>
