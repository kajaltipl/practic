<!DOCTYPE html>
<html>
    <head>
        <style>
            *{
                box-sizing: border-box;
            }
            .row{
                display: inline-flex;
                width: 100%;
            }
            .col-75{
                width: 75%;
                padding: 5px;
            }
            .col-25{
                width: 25%;
                padding: 5px;
            }
            .col-100{
                width: 100%;
                padding: 5px;
            }
            .border
            {
                border: 1px solid gray;
            }
            .btn{
                width: 70px;
                height: 40px;
                background-color: rgba(56, 137, 243, 0.966);
                color: white;
                font-size: 15px;
                border: none;
                border-radius: 5px;
            }
            .mt-10{
                margin-top:10px;
            }
            .error {color: #FF0000;}
        </style>
    </head>
    <title> horizon-form </title>
    <body>
    <?php
// define variables and set to empty values
$emailErr =  $password = $gender = "";
$email =  $passwordErr = $genderErr = "";

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

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
    
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Please Select Radio is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>        
       <form class="border" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
           <div class="row">
               <div class="col-25">
                    <label>Email</label>       
               </div>
               <div class="col-75">
                    <input class="col-100 mt-10" type="text" placeholder="Email" name=email value="<?php echo $email;?>"> 
                    <span class="error">* <?php echo $emailErr;?></span>
                </div>    
            </div>
            <div class="row">
                <div class="col-25">
                     <label>Password</label>       
                </div>
                <div class="col-75">
                     <input class="col-100 mt-10" type="password" placeholder="Password" value="<?php echo $password;?>"> 
                     <span class="error">* <?php echo $passwordErr;?></span>
                    </div>    
             </div>
             <div class="row">
                <div class="col-25">
                     <label>Radios</label>       
                </div>
                <div class="col-75 mt-10">
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="First Radio">
                <label>First Radio</label><br> 
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="Second Radio">
                <label>Second Radio</label><br>
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Second Radio" disabled>Other  
                <label>Third Disabled Radio</label>
                <span class="error">* <?php echo $genderErr;?></span>
                 
                </div>    
             </div>
            <div class="row">
                <div class="col-25">
                    <label>Checkbox</label>
                </div>
                <div class="col-75 mt-10">                    
                    <input type="checkbox" value="Example Checkbox">
                    <label> Example Checkbox </label>
                </div>    
            </div>
            <div  class="row">
                <div class="col-100 mt-10">
                    <input class="submit" type="submit" value="Submit" >
                </div>    
            </div> 
       </form> 
       <?php
echo "<h2>Your Input:</h2>";
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $gender;

?>    
    </body>
</html>        