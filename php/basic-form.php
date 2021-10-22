<html>
<head>
<style>
input { width:100%; }
select { width:100%; }
textarea { width:100%; height:20%; }
.error {color: #FF0000;}
</style>    
</head>
<title>basic-form</title>
<body>
<?php
// define variables and set to empty values
//print_r($_POST);
$emailErr = $select = $select2 = $txtarea ="";
$email = $selectErr =  "";
/*echo "<pre>";
var_dump($_POST);
print_r($_POST);*/
function checkselect($value) {
 // print_r($_POST['select2']);
  foreach($_POST['select2'] as $key=>$val) {
      if($val == $value) {
        return "selected";
        break;
      }
      
  }
  return;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["select"])) {
    $selectErr = "Select is required";
    $select = "";
  } else {
    $select = test_input($_POST["select"]);
  } 
  
  if (empty($_POST["txtarea"])) {
    $txtarea = "";
  } else {
    $txtarea = test_input($_POST["txtarea"]);
  }    
 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <lable> Email Address </lable>
    <br>
    <input type="text" name="email" placeholder="name@example.com" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
     </input>
    <br>
    <br>
    <lable>Example Select  </lable>
    <span class="error">* </span>
    <br>
    <select name="select"  type="number" value="<?php echo $select; ?>">
   
        <option value="1"> 1  </option>
        <option value="2"> 2  </option>
        <option value="3"> 3  </option>
        <option value="4"> 4  </option>
    </select>
    <br>
    <br>
    <lable>Example Multiple Select  </lable>
    <span class="error">* </span>  
    <br>
    <select type="number" name="select2[]" multiple>
       
        <option value="2" <?php echo checkselect(2);?>> 2  </option>
        <option value="3" <?php echo checkselect(3);?>> 3  </option>
        <option value="4" <?php echo checkselect(4);?>> 4  </option>
        <option value="5" <?php echo checkselect(5);?>> 5  </option>
    </select>
    <br>
    <br>
    <lable>Example textarea  </lable>
    <br>
    <textarea name="txtarea" value="<?php echo $txtarea; ?>"> </textarea>
    <span class="error">* </span>
    <input type="submit" name="submit" value="Submit"> 
</form>
<?php
echo "<h2>Your Input:</h2>";
echo "<br>";
echo $email;
echo "<br>";
echo $select;
echo "<br>";
if(isset($_POST["submit"]))
  {
    // Check if any option is selected
    if(isset($_POST["select2"]))
    {
        // Retrieving each selected option
        foreach ($_POST['select2'] as $select2)
            print " $select2 <br/>";
    }
else
    echo "Select an option first !!";
}
echo $txtarea;

?>

</body>
</html>