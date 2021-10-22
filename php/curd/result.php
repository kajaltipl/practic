<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "rOot@123!";
$db = "Exercise";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from product where p_name like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["p_name"]."<br>";
    echo $row["p_desc"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>