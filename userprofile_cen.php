<?php
        session_start();
        require_once("connection.php");
        require_once("header.php");
        if(!isset($_SESSION['username']))
        {
                header("location: login_cen.php");
        }
        $name=$_SESSION['username'];
        $cenname='';
        //$username='';
        $ownername='';
        $flat='';
        $house='';
        $road='';
        $area='';
        $city='';
        $zip='';
        $phone='';
        //$profile='';
        //$lastId= $conn->insert_id;
        //$email=$_SESSION['email'];
        $getquery=mysqli_query($conn, "SELECT * FROM center WHERE username = '$name'");
        while($rows=mysqli_fetch_assoc($getquery))
        {
        $cenname=$rows['cenname'];
        $username=$rows['username'];
        $ownername=$rows['name'];
        $flat=$rows['flat'];
        $house=$rows['house'];
        $road=$rows['road'];
        $area=$rows['area'];
        $city=$rows['city'];
        $zip=$rows['zip'];
        $phone=$rows['phone'];
        //$profile=$_FILES['profile']['tmp_name'];



        }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play" type="text/css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link href="css/gradient_up.css" rel="stylesheet" type="text/css">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
  </head>
  <body>
    <div class="container">
      <div class="row profile">
        <div class="col-md-3">
          <div class="profile-sidebar">
            <div class="profile-user-pic">
              <?php
                  $host ="localhost";
                  $uname = "root";
                  $pwd = "";
                  $db_name = "childcare";
                  $id = $_SESSION['id'];
                  $file_path = 'images_center/';
                  $result = mysqli_connect($host,$uname,$pwd) or die("Could not connect to database." .mysqli_error());
                  mysqli_select_db($result,$db_name) or die("Could not select the databse." .mysqli_error());
                  $image_query = mysqli_query($result,"select profile from center where id=$id");
                  while($rows = mysqli_fetch_array($image_query))
                  {
                      $img_name = $rows['profile'];
                      //$img_src = $rows['img_path'];
               ?>
               <img src="images_center/<?php echo $img_name; ?>" class="img-responsive img-circle" /><br />

            </div>
            <?php
            }
        ?>
            <div class="profile-user-title">
              <div class="profile-user-name">
                <?php echo $ownername;?>
              </div>

            </div>
            <div class="profile-user-buttons">
              <button class="btn btn-success btn-sm"><a href="editprofile_cen.html">Edit Profile</a></button>
              <button class="btn btn-danger btn-sm"><a href="upImage.php">Upload an Image</button>
              <button class="btn btn-danger btn-sm"><a href="logout.php">Logout</a></button>
            </div>
            <div class="profile-user-menu">
              <ul class="nav">
                <li class="active"><a href="#"><i class="glyphicon glyphicon-home"></i> Overview</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Account Status</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-ok"></i> Tasks</a></li>
                <li><a href="chatbot/chatbot.php"><i class="glyphicon glyphicon-flag"></i> Help</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <p><ul>
            <li>Center Name: <?php echo $cenname; ?> <br></li>
            <li>Owner Name: <?php echo $ownername; ?> <br></li>
            <li>Flat #<?php echo $flat; ?> , House #<?php echo $house; ?>, Street #<?php echo $road; ?>,<br>
              <?php echo $city; ?>, <?php echo $zip; ?>, Bangladesh</li>
            <li>Contact No: <?php echo $phone; ?></li>
          </ul>

            </p>
        </div>
      </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


  </body>
</html>
