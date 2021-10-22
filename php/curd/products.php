
<?php
 
include "conn.php";

$min_price=$_GET['min_price'];
$max_price=$_GET['max_price'];

//echo "Test min price".$min_price;

//$r=$conn->query("SELECT * FROM product WHERE product_price BETWEEN '$min_price' AND '$max_price' ");
$sql = "SELECT * FROM product WHERE product_price BETWEEN '$min_price' AND '$max_price'";
		 
$result = $conn->query($sql);
 
while($row=$result->fetch_assoc()){
	
	echo "<div class='pr_list'>";
		echo "<b>".$row['p_name']."</b><br>";
		echo "<img src='images/".$row['p_img']."' style='max-height:130px'><br>";
		echo "Cost Rs. ".$row['product_price']."<br>";
		
	echo "</div>";
	
}

?>