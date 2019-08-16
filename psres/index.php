<?php
session_start();
require("functions.php");
if(!isset($_GET['id'])&&isset($_SESSION['username'])) header("Location: ?id=".getId($_SESSION['username']));
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile System</title>
<link type="text/css" rel="stylesheet" href="styles.css" />
</head>

<body>

<div id="container">
	<?php
	if(!isset($_SESSION['username']))
	{
		?>
        <form action="authenticate.php" method="POST">
            Username: <input type="text" name="username" placeholder="Enter Your Username..."><br />
            Password: <input type="password" name="password" placeholder="Enter Your Password..."><br />
            <input type="submit" value="Login">
        </form>
    	<?php
		if(isset($_GET["feedback"]))
			echo $_GET["feedback"];
	}
	?>

    <?php
	if(isset($_SESSION['username']))
	{
		 $profileUsersData = getUsersData(mysqli_real_escape_string($_GET['id']));
		?>
        <div id="menu">
       		<a href="index.php">Profile</a>
        	<a href="account.php">Account</a>
            <a href="logout.php">Logout</a>
        </div>
        <?php if(userExists(mysqli_real_escape_string($_GET['id']))){ ?>
		<div id="header">
			<?php echo $profileUsersData['firstname']." ".$profileUsersData['lastname']."'s Profile"; ?>
        </div>
        <div id="wrapper">
            <div id="profilePicture">
                <?php
					if($profileUsersData['profileext']=="n/a")
						echo '<img src="images/profile.png" />';
					else
						echo '<img src="images/userimages/'.$profileUsersData['id'].'.'.$profileUsersData['profileext'].'" width="200" height="200" />';
				?>
            </div>
            <div id="aboutMe">
                <strong><u>About Me</u></strong><br />
                <?php echo $profileUsersData['aboutme']; ?>
            </div>
        </div>
        <div id="userDetails">
            <table width="200" border="0">
            	<tr>
                	<td width="55">Age:</td>
                    <td>
						<?php
                             $difference = time() - $profileUsersData['birthday'];
							 $age = floor($difference / 31556926);
							 echo $age;
                        ?>
                    </td>
                </tr>
                <tr>
                	<td width="55">Country:</td>
                    <td><?php echo $profileUsersData['country']; ?></td>
				</tr>
                <tr>
                    <td width="55">City:</td>
                    <td><?php echo $profileUsersData['city']; ?></td>
				</tr>
            </table>
        </div>
        <?php } else echo "Invalid ID"; ?>
    	<?php
	}
	?>
</div>

</body>
</html>
