<?php
	$conn = new mysqli("localhost","root","rOot@123!","cart_system");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>