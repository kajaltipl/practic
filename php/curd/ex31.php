
<?php
// Database configuration
 include "conn.php";
// Create database connection
//$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
//if ($db->connect_error) {
  //  die("Connection failed: " . $db->connect_error);
//}
if (isset($_POST['SetImage'])) {
    // print_r($_POST);
    $updatequery = $conn->query("Update images SET eMain=1 Where id=" . $_POST['eMain']);
    $updatequery = $conn->query("Update images SET eMain=0 Where id !=" . $_POST['eMain']);
}
?>
<html>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        Select Image Files to Upload:
        <input type="file" name="files[]" multiple>
        <input type="submit" name="submit" value="UPLOAD">
    </form>
</body>
<?php

// Include the database configuration file 
// include_once 'dbConfig.php'; 

if (isset($_POST['submit'])) {
    // File upload configuration 
    $targetDir = "images/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
        foreach ($_FILES['files']['name'] as $key => $val) {
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql 
                    $insertValuesSQL .= "('" . $fileName . "', NOW()),";
                } else {
                    $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                }
            } else {
                $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
            }
        }

        // Error message 
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database 
            $insert = $conn->query("INSERT INTO images (file_name, uploaded_on) VALUES $insertValuesSQL");
            if ($insert) {
                $statusMsg = "Files are uploaded successfully." . $errorMsg;
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = "Upload failed! " . $errorMsg;
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }
}

?>
<form name="frmimage" action="" method="post">
    <div>
        <table border="1px" bgcolor="lightpink" width="100%">
            <tr>
                <?php

                // Include the database configuration file
                //include_once 'dbConfig.php';

                // Get images from the database
                $query = $conn->query("SELECT * FROM images ORDER BY eMain DESC");

                if ($query->num_rows > 0) {
                    $i = 0;
                    while ($row = $query->fetch_assoc()) {
                        // print_r($row);
                        $imageURL = 'images/' . $row["file_name"];
                        if ($row['eMain'] == 1) {
                            $checked = "checked";
                            $width = "130px";
                            echo "<td><img src='" . $imageURL . "' alt='' width='" . $width . "' rowspan=8 name='mainImage' id='mainImage'><input type='radio' name='eMain' id='eMain' value='" . $row['id'] . "' " . $checked . "></td><td>&nbsp;</td></tr></table><table border=2px bgcolor='purple'><tr>";
                        } else {
                            $checked = "";
                            $width = "50px";
                            echo "<td onclick='changeImage(\"" . $imageURL . "\");'><img src='" . $imageURL . "' alt='' width='" . $width . "'/><input type='radio' name='eMain' id='eMain' value='" . $row['id'] . "' " . $checked . "></td>";
                        }
                ?>

                    <?php
                        $i++;
                        if ($i % 9 == 0) {
                            echo "</tr><tr>";
                        }
                    }
                    echo "</tr>";
                } else { ?>
                    <p>No image(s) found...</p>
                <?php } ?>
            <tr>
                <td colspan=8 align="center"><input type="submit" name="SetImage" id="SetImage" Value="Set Main Image">
        </table>
    </div>
</form>
<table>

</table>
<script>
    function changeImage(imgPath) {
        document.getElementById('mainImage').src = imgPath;
    }
</script>

</html>
