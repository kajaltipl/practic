<?php
    include 'conn.php';
?>
<!DOCTYPE HTML>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excersice-4</title>
    
<style>
.error {color: #FF0000;}
</style>
</head>
<?php
// define variables and set to empty values
//$p_nameErr = $p_descErr = "";
//$p_name =  $p_desc = "";

/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["p_name"])) {
    $p_nameErr = "Product Name is required";
  } else {
    $p_name = test_input($_POST["p_name"]);
    // check if name only contains letters and whitespace
     
       
    
  }
  if (empty($_POST["p_desc"])) {
    $p_descErr = "Product Description is required";
  } else {
    $p_desc = test_input($_POST["p_desc"]);
  }
   
}

  

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

 */ 

 
 
// Check if image file is a actual image or fake image
 
?>
 


<body>
	<a href="pro_index.php">Go to Home</a>
	<br/><br/>
  
	 
     <form method="post" name="form1" action="" enctype="multipart/form-data">      
		<table width="25%" border="0">
			<tr>
				<td>Product Name</td>
				<td><input type="text" name="p_name" value="<?php echo $p_name;?>"></td>
        
                 
			</tr>
      <tr>
				<td>Product Price</td>
				<td><input type="text" name="product_price" value="<?php echo $product_price;?>"></td>
        
                 
			</tr>
			<tr>
				<td>Product Description</td>
				<td><input type="text" name="p_desc" value="<?php echo $p_desc;?>"></td>
         
			</tr>
			<tr>
				<td>Product Img</td>
				<td><input type="file" name="p_img" id="fileToUpload" value="<?php echo $p_img;?>"></td>
			</tr>
            <tr>
				<td>Product Status</td>
        <td><select name="p_status">
                  <option value="1" <?php echo $p_status == "1" ? "selected":"";?>>Active</option>
                  <option value="2" <?php echo $p_status == "2" ? "selected":"";?>>DeActive</option>
              </select>
        </td>
         </tr>
         </tr>
        <td>Product pro_cat_id</td>
   
        <td> 
        <select name="pro_cat_id" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="">Select Category</option> 
<?php $query=mysqli_query($conn,"select * from pro_cat");
print_r($query);
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['c_id'];?>"><?php echo $row['c_name'];?></option>
<?php } ?>
</select>
        </td>
			 
			</tr>
			<tr>
				<td></td>
                <td> <input type="submit" name="submit" value="Submit">  </td>
			</tr>
</table>
	</form>

	<?php
        

    
      if(isset($_POST['submit'])) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["p_img"]["name"]);
        $uploadOk = 1;
         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $p_name =  $_POST['p_name'];
        $product_price =  $_POST['product_price'];
        $p_desc = $_POST['p_desc'];
        $p_img=($_FILES['p_img']['name']);
        //$p_img = $_POST['p_img'];
        $p_status = $_POST['p_status'];
        $pro_cat_id = $_POST['pro_cat_id'];
        $sql = "INSERT INTO product (p_name,product_price,p_desc,p_img,p_status,pro_cat_id) VALUES ('$p_name','$product_price', '$p_desc', '$p_img', '$p_status','$pro_cat_id')";
        //img update  
        //  print_r($sql);
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
        
        // Check file size
        if ($_FILES["p_img"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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



        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully.</h3>" ;
         
  
            
        } else{
            echo "ERROR: $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
      }  
        ?> 

</body>
</html>