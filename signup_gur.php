<?php
    /*error_reporting(E_ALL);
    ini_set('display_errors', 1);*/
    //$cenname=$_POST["cenname"];


    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $GuardianUsername=$_POST["GuardianUsername"];
    $email=$_POST["email"];
    //$address=$_POST["address"];
    $password=$_POST["password"];
//$param_password = password_hash($password, PASSWORD_DEFAULT);
if( !empty($firstname) || !empty($lastname) || !empty($GuardianUsername) || !empty($email) || !empty($password))
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
        $SELECT= "SELECT GuardianUsername from guardian where GuardianUsername = ? Limit 1";
        $password = password_hash($password, PASSWORD_DEFAULT);
       	$INSERT = "INSERT into guardian (firstname, lastname, GuardianUsername, email, password) values(?, ?, ?, ?, ?)";
    	/*$stmt = $conn->prepare($SELECT);
    	$stmt->bind_param("s", $email);
    	$stmt->execute();
    	$stmt->bind_result($email);
    	$stmt->store_result();
    	$rnum = $stmt->num_rows;*/
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $GuardianUsername);
        $stmt->execute();
        $stmt->bind_result($GuardianUsername);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
    	if($rnum == 0)
    	{
    		$stmt->close();
    		$stmt = $conn->prepare($INSERT);
    		$stmt->bind_param("sssss", $firstname, $lastname, $GuardianUsername, $email, $password);

           // $param_GuardianUsername = $GuardianUsername;

    		$stmt-> execute();
    		header('Location: login_gur.php');
    		//echo "New Record inserted successfully";
    	}
    	else
    	{
    		echo "Somebody already registered using this GuardianUsername. Please try a new GuardianUsername";
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
