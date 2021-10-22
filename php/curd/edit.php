<?php
// include database connection file
include_once("conn.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["p_img"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$p_id = $_POST['p_id'];
    $p_name=$_POST['p_name'];
	$product_price=$_POST['product_price'];
	$p_desc=$_POST['p_desc'];
	$p_img=($_FILES['p_img']['name']);
    $p_status=$_POST['p_status'];
    
	// update user data
	$result = mysqli_query($conn, "UPDATE product SET p_name='$p_name',product_price='$product_price',p_desc='$p_desc',p_img='$p_img' WHERE p_id = $p_id");
     //img update  
          print_r($result);
        $check = getimagesize($_FILES["p_img"]["tmp_name"]);
        if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
        } else {
        echo "File is not an image.";
        $uploadOk = 0;
        }
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        
        
        
         
       // echo $uploadOk;
       // exit();
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          
          if (move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["p_img"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }


	// Redirect to homepage to display updated user in list
	header("Location: pro_index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$p_id = $_GET['p_id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM product WHERE p_id = $p_id");

while($user_data = mysqli_fetch_array($result))
{
	$p_name = $user_data['p_name'];
	$product_price = $user_data['product_price'];
	$p_desc = $user_data['p_desc'];
	$p_img=($_FILES['p_img']['name']);
    $p_status = $user_data['p_status'];
}
?>
<html>
<head>
	<title>Edit User Data</title>
</head>

<body>
	<a href="pro_index.php">Home</a>
	<br/><br/>

	<form name="update_user" method="post" action="edit.php" enctype="multipart/form-data">
		<table border="0">
			<tr>
				<td>Product Name</td>
				<td><input type="text" name="p_name" value=<?php echo $p_name;?>></td>
			</tr>
			<tr>
				<td>Product Price</td>
				<td><input type="text" name="product_price" value=<?php echo $product_price;?>></td>
			</tr>
			<tr>
				<td>Product Description</td>
				<td><input type="text" name="p_desc" value=<?php echo $p_desc;?>></td>
			</tr>
			<tr>
				<td>Product Img</td>
				<td><input type="file" name="p_img" value=<?php echo $p_img;?>></td>
			</tr>
            <tr>
				<td>Product Status</td>
                <td><select name="p_status">
				      <option value="1" <?php echo $p_status == "1" ? "selected":"";?>>Active</option>
                      <option value="2" <?php echo $p_status == "2" ? "selected":"";?>>DeActive</option>
                  </select>

              
        </td>
				 
			</tr>
			<tr>
				<td><input type="hidden" name="p_id" value=<?php echo $_GET['p_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>