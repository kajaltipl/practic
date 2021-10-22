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
$nameErr = $designation = "";
$name =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
    
  if (empty($_POST["designation"])) {
    $designation = "";
  } else {
    $designation = test_input($_POST["designation"]);
  }
}

  

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
  
?>
    <body>  
    
    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
         Name: <input type="text" name="name" value="<?php echo $name;?>">
         <span class="error">* <?php echo $nameErr;?></span>
         <br><br>
         Designation: <input type="text" name="designation" value="<?php echo $designation;?>">
         <span class="error">* </span>
         <br><br>
        <input type="submit" name="submit" value="Submit"> 
   
    </form>
    <?php
        $name =  $_REQUEST['name'];
        $designation = $_REQUEST['designation'];
       
        $sql = "INSERT INTO customer (name,designation) VALUES ('$name', '$designation')";
        echo $sql;  
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?> 

</body>
</html>
