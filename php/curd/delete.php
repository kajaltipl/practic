<?php
// include database connection file
 include "conn.php";

// Get id from URL to delete that user
$p_id = $_GET['p_id'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM product WHERE p_id = $p_id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pro_index.php");
?>