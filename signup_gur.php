<?php
    /*error_reporting(E_ALL);
    ini_set('display_errors', 1);*/
    //$cenname=$_POST["cenname"];
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    //$address=$_POST["address"];
    $password=$_POST["password"];
//$param_password = password_hash($password, PASSWORD_DEFAULT);
if( !empty($firstname) || !empty($lastname) || !empty($username) || !empty($email) || !empty($password))
{
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "childcare";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if(mysqli_connect_error())
    {
    	die('Connect Error('. mysqli_connect_errno(). ')' . mysqli_connect_error());
    }
    else
    {
    	//$SELECT = "SELECT email from user_info where email = ? Limit 1";
        $SELECT= "SELECT username from guardian where username = ? Limit 1";
        $password = password_hash($password, PASSWORD_DEFAULT);
       	$INSERT = "INSERT into guardian (firstname, lastname, username, email, password) values(?, ?, ?, ?, ?)";
    	/*$stmt = $conn->prepare($SELECT);
    	$stmt->bind_param("s", $email);
    	$stmt->execute();
    	$stmt->bind_result($email);
    	$stmt->store_result();
    	$rnum = $stmt->num_rows;*/
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($username);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
    	if($rnum == 0)
    	{
    		$stmt->close();
    		$stmt = $conn->prepare($INSERT);
    		$stmt->bind_param("sssss", $firstname, $lastname, $username, $email, $password);

           // $param_username = $username;

    		$stmt-> execute();
    		header('Location: login_gur.php');
    		//echo "New Record inserted successfully";
    	}
    	else
    	{
    		echo "Somebody already registered using this username. Please try a new username";
    	}
    	$stmt->close();
    	$conn->close();
    }
}
else
{
	echo "All fields are required";
	die();
}
?>
