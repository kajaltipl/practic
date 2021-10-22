 
<?php
$servername = "localhost";
$username = "root";
$password = "rOot@123!";
$dbname = "Exercise";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO customer (id, name, designation)
VALUES ('1', 'Doe', 'developer'),('2', 'Moe', 'designer'),('3', 'Dooley', 'seo');";
 

if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

 