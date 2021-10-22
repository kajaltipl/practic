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
            a{
                opacity: 0.5;
            }
            .mt-20{
                margin-top:20px;
            }
            .error {color: #FF0000;}
        </style>
    </head>
    <title> login-form </title>
    <body>
    <?php
// define variables and set to empty values
$passwordErr = $emailErr = "";
$password = $email = "";

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
    $passwordErr = "Please Enter Your Password";
  } 
elseif (strlen($_POST["password"]) <= '8') {
    $passwordErr = "Your Password Must Contain At Least 8 Characters!";
}
elseif(!preg_match("#[0-9]+#",$password)) {
    $passwordErr = "Your Password Must Contain At Least 1 Number!";
}
elseif(!preg_match("#[A-Z]+#",$password)) {
    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
}
elseif(!preg_match("#[a-z]+#",$password)) {
    $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
}
  else {
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
        <div class="row">
            <div class="col-100">
                <label> Email </label>
                <input type="text" class="col-100 mt-20" placeholder="Email" name=email value="<?php echo $email;?>">
                <a>We"ll never share your email with anyone else</a>
                <span class="error">* <?php echo $emailErr;?></span>
            </div>             
          
        </div>
        <div class="row">
            <div class="col-100">
                <label> Password </label>
                <input type="text" class="col-100 mt-20" placeholder="Password" name=password>  
                <span class="error">* <?php echo $passwordErr;?></span>
            </div>             
        </div>
        <div class="row">    
            <div class="col-100">
                <input  class="mt-20" type="checkbox" value="Example Checkbox">
                <label  class="mt-20"> Check Me Out  </label>
            </div>    
        </div>
        <div  class="row">
            <div class="col-100">
                <input class="submit" type="submit" value="Sign in" >
            </div>    
        </div> 
       </form> 
       <?php
echo "<h2>Your Input:</h2>";
echo $email;
echo "<br>";
echo $passwordErr;
echo "<br>";
?>
    </body>
</html>        