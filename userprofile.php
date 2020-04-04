<?php
        session_start();
        require_once("header.php");
        if(!isset($_SESSION['username']))
        {
                header("location: login_gur.php");
        }
        $name=$_SESSION['username'];

        //$email=$_SESSION['email'];
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
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
  </head>
  <body>
    <div class="container">
      <div class="row profile">
        <div class="col-md-3">
          <div class="profile-sidebar">
            <div class="profile-user-pic">
              <img src="http://guarddome.com/assets/images/profile-img.jpg" alt="" class="img-responsive img-circle">
            </div>
            <div class="profile-user-title">
              <div class="profile-user-name">
                <?php echo $name; ?>
              </div>
              <div class="profile-user-job">
                Developer
              </div>
            </div>
            <div class="profile-user-buttons">
              <button class="btn btn-success btn-sm">Edit Profile</button>
              <button class="btn btn-danger btn-sm">Check Info</button>
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
            <li>Center Name: <br></li>
            <li>Owner Name: <br></li>
            <li>Flat # , House #, Street #,<br>
              spaceeeeeee</li>
            <li>Contact No: </li>
          </ul>

            </p>
        </div>
      </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


  </body>
</html>
