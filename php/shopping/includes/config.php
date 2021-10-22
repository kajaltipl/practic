<?php
/*
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'rOot@123!');
define('DB_NAME', 'shopping');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
*/
?>


<?php
$servername = "localhost";
$username = "root";
$password = "rOot@123!";
$dbname = "shopping";


// Create connection
$con = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
