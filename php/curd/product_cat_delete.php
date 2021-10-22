<?php
// include database connection file
 include "conn.php";

// Get id from URL to delete that user
$c_id = $_GET['c_id'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM pro_cat WHERE c_id = $c_id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:product_cat.php");
?>