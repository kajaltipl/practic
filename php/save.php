<?php
include 'conn.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$p_name=$_POST['p_name'];
		$p_desc=$_POST['p_desc'];
		$p_img=$_POST['p_img'];
		$p_status=$_POST['p_status'];
		$sql = "INSERT INTO `product`( `p_name`, `p_desc`,`p_img`,`p_status`) 
		VALUES ('$p_name','$p_desc','$p_img','$p_status')";
        print_r($sql);
		if (mysqli_query($conn, $sql)) {
			//echo json_encode(array("statusCode"=>200));
            echo "New record created successfully !";
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['p_id'];
		$p_name=$_POST['p_name'];
		$p_desc=$_POST['p_desc'];
		$p_img=$_POST['p_img'];
		$p_status=$_POST['p_status'];
		$sql = "UPDATE `product` SET `p_name`='$p_name',`p_desc`='$p_desc',`p_img`='$p_img',`p_status`='$p_status' WHERE p_id = $p_id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$p_id=$_POST['p_id'];
		$sql = "DELETE FROM `product` WHERE p_id = $p_id ";
		if (mysqli_query($conn, $sql)) {
			echo $p_id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['p_id'];
		$sql = "DELETE FROM product WHERE p_id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>