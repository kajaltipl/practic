<?php
 include "conn.php";
 ?>
 <!DOCTYPE html>
<html>
<head>
    <title>Insert Page page</title>
</head>
  
<body>
    <center>
        
    

        <?php 
     // Taking all 5 values from the form data(input)
        $first_name =  $_REQUEST['fname'];
        $last_name = $_REQUEST['lname'];
        $mobile = $_REQUEST['mobile'];
        $pwd = $_REQUEST['password'];
        $cpwd = $_REQUEST['cpwd'];
        $cty = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $country = $_REQUEST['country'];
        $img = $_REQUEST['pic'];
          
        // Performing insert query execution
        $target_dir = "img/";
        $img = $target_file = $target_dir . basename($_FILES["pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["pic"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          
          // Check file size
          if ($_FILES["pic"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          
          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
          }
          
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["pic"]["name"])). " has been uploaded.";
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }




         

          $sql = "INSERT INTO registration  VALUES ('$first_name', 
          '$last_name','$mobile','$pwd','$cpwd','$cty','$state','$country','$img')";
        
      if(mysqli_query($conn, $sql)){
          echo "<h3>data stored in a database successfully." ; 
echo nl2br("\n$first_name\n $last_name\n  $mobile\n $pwd\n $cpwd\n $cty\n 
$state\n $country\n $img");
      } else{
          echo "ERROR: Hush! Sorry $sql. " 

          
              . mysqli_error($conn);
      }
       
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>