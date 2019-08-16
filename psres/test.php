<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'Pole_Fitness'); 
define('DB_USER','root');
define('DB_PASSWORD','root');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

session_start();
$_SESSION['userName']
$userName = $_SESSION['userName']

    $getquery=mysql_query("SELECT * FROM WebsiteUsers WHERE userName = '$userName'");
    while($rows=mysql_fetch_assoc($getquery))
    {
    $FirstName=$rows['FirstName'];
    $LastName=$rows['LastName'];
    $DOB=$rows['DOB'];

    echo $FirstName . '<br/>' . '<br/>' . $LastName . '<br/>' . '<br/>' . $DOB '<hr size="3"/>';
    }
    ?>
