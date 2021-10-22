
<!DOCTYPE html>
<html>
<body>
<form  method="post" enctype="multipart/form-data">
    <input type="file" name="image_gallery[]" multiple>
    <input type="submit" value="Upload Now" name="submit">
</form>

<?php
include('conn.php');
$db=$conn; // Enter your Connection variable;
$tableName='gallery'; // Enter your table Name;
// upload image on submit
if(isset($_POST['submit'])){ 
    echo upload_image($tableName); 
}
  function upload_image($tableName){
   
    $uploadTo = "images/"; 
    $allowedImageType = array('jpg','png','jpeg','gif');
    $imageName = array_filter($_FILES['image_gallery']['name']);
    $imageTempName=$_FILES["image_gallery"]["tmp_name"];
    $tableName= trim($tableName);
if(empty($imageName)){ 
   $error="Please Select Images..";
   return $error;
}else if(empty($tableName)){
   $error="You must declare table name";
   return $error;
}else{
   $error=$savedImageBasename='';
   foreach($imageName as $index=>$file){
         
    $imageBasename = basename($imageName[$index]);
    $imagePath = $uploadTo.$imageBasename; 
    $imageType = pathinfo($imagePath, PATHINFO_EXTENSION); 
 if(in_array($imageType, $allowedImageType)){ 
    // Upload image to server 
    if(move_uploaded_file($imageTempName[$index],$imagePath)){ 
        
    // Store image into database table
     $savedImageBasename .= "('".$imageBasename."'),";     
    }else{ 
     $error = 'File Not uploaded ! try again';
  } 
}else{
    $error .= $_FILES['file_name']['name'][$index].' - file extensions not allowed<br> ';
 }
 }
    save_image($savedImageBasename, $tableName);
}
    return $error;
}
    // File upload configuration 
 function save_image($savedImageBasename, $tableName){
      global $db;
      if(!empty($savedImageBasename))
      {
      $value = trim($savedImageBasename, ',');
      $saveImage="INSERT INTO ".$tableName." (image_name) VALUES".$value;
      $exec= $db->query($saveImage);
      if($exec){
        echo "Images are uploaded successfully";  
        '<a href="show-image-gallery.php" target="_blank">Show Gallary</a>'; 

       }else{
        echo  "Error: " .  $saveImage . "<br>" . $db->error;
       }
      }
    }     
    
?>