<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "tipl";
$dbPassword = "Tipl@123!";
$dbName     = "Exercise";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
<html>
    <body>
<form action="" method="post" enctype="multipart/form-data">
    Select Image Files to Upload:
    <input type="file" name="files[]" multiple >
    <input type="submit" name="submit" value="UPLOAD">
</form>
    </body>
    <?php
    
    // Include the database configuration file 
   // include_once 'dbConfig.php'; 
         
    if(isset($_POST['submit'])){ 
        // File upload configuration 
        $targetDir = "images/"; 
        $allowTypes = array('jpg','png','jpeg','gif'); 
         
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
        $fileNames = array_filter($_FILES['files']['name']); 
        if(!empty($fileNames)){ 
            foreach($_FILES['files']['name'] as $key=>$val){ 
                // File upload path 
                $fileName = basename($_FILES['files']['name'][$key]); 
                $targetFilePath = $targetDir . $fileName; 
                 
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                        // Image db insert sql 
                        $insertValuesSQL .= "('".$fileName."', NOW()),"; 
                    }else{ 
                        $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                    } 
                }else{ 
                    $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                } 
            } 
             
            // Error message 
            $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
            $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
            $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
             
            if(!empty($insertValuesSQL)){ 
                $insertValuesSQL = trim($insertValuesSQL, ','); 
                // Insert image file name into database 
                $insert = $db->query("INSERT INTO images (file_name, uploaded_on) VALUES $insertValuesSQL"); 
                if($insert){ 
                    $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file."; 
                } 
            }else{ 
                $statusMsg = "Upload failed! ".$errorMsg; 
            } 
        }else{ 
            $statusMsg = 'Please select a file to upload.'; 
        } 
    } 
     
    ?>

<?php

// Include the database configuration file
//include_once 'dbConfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY id DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'images/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?> 

</html>