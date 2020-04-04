<?php
require_once("connection.php");
//require_once("signup_cen.php");
session_start();

if(isset($_POST["update"]))
{
  $imgFile = $_FILES['profile']['name'];
  $tmp_dir = $_FILES['profile']['tmp_name'];
  $imgSize = $_FILES['profile']['size'];
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
    if(!empty($imgFile))
    {

    $upload_dir = 'image/'; // upload directory

    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

    // rename uploading image
    $coverpic = rand(1000,1000000).".".$imgExt;

    // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){
    // Check file size '5MB'
    if($imgSize < 5000000) {
    move_uploaded_file($tmp_dir,$upload_dir.$coverpic);
    }
    else{
    $errMSG = "Sorry, your file is too large.";
    }
    }
    else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

   //For Database Insertion
    // if no error occured, continue ....
    if(!isset($errMSG))
    {
    $que = "UPDATE center(profile) SET VALUES('" . $coverpic . "') WHERE username='$_SESSION[username]'";

    if(mysqli_query($conn, $que))
    {
    echo "<script type='text/javascript'>alert('Posted succesfully.');</script>";
    }
    else
    {
    echo "<script type='text/javascript'>alert('error while inserting....');</script>";
    }

    }


    }


    //Get Last Inserted Id
    $id=$_SESSION['id'];

    //Fetch Qquery
    $que = "SELECT profile FROM center where username='$_SESSION[username]'";
    $result = mysqli_query($conn, $que);
    $row=mysqli_fetch_assoc($result);





}

?>
