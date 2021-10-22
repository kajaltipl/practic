<!DOCTYPE html>
<html>
    <head>
        <title>email-style</title>
        <style>
            *{
                box-sizing: border-box;
            }
            .abcd{
                width: 100%;
                height: 450px;
                background-color:  rgb(218, 207, 207);
               
            }
            .simple
            {
                width: 100%;
                height: 10px;
                background-color: gray;
                z-index: -1;
            }
            .password1{
                width: 100%;
                padding: 5px;
            }
            .password2{
                width: 70%;
                padding: 5px;
            }
            .row{
                display: inline-flex;
                width: 100%;
                background-color: #fff;
            }
            .col-75{
                
                padding: 12px;
                width: 75%;
            }
            .col-25{
                padding: 12px;
                width: 25%;
            }
            .col-20{
                padding: 12px;
                width: 20%;
            }
            .col-60{
                padding: 12px;
                width: 60%;
            }
            .btn{
                width: 22%;
                height: 35px;
                color: honeydew;
                font-size: 15px;
                border-radius: 5px;
                background-color: royalblue ;

            }
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
<?php


 $passwordErr=$cpasswordErr="";
 $password=$cpassword="";


 if ($_SERVER["REQUEST_METHOD"] == "POST") {  
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
 
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
          
          if (empty($_POST["cpassword"])) {
            $cpasswordErr = "Please Enter The Confirm Password ";
          } else {
            
          }
          if (!empty($_POST["password"]) && $_POST["password"] === $_POST["cpassword"]) {
            $passwordmatch= "Your Password Is Match";
         }
         elseif($_POST["password"] != $_POST["cpassword"]) {
            $cpasswordmatch="Please Enter The Correct Password";
         }
        
    }
}
?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">    
        <div class="abcd">
            <div class="simple">
            
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Email</label>
                </div> 
                <div class="col-75">   
                    <label>email@example.com</label>
                </div>
            </div> 
            <div class="row">
                <div class="col-25">
                    <label>Password</label>
                </div>
                <div class="col-75">    
                    <input type="password"  name="password" placeholder="Password" class="password1" value="<?php echo $password;?>">
                    <span class="error">* <?php echo $passwordErr;?></span>
                </div>
            </div>
           
        </div>
        <div class="simple">
            
        </div> 
        <div class="row">
            <div class="col-20"> 
                <label>conform password</label>
            </div>
            <div class="col-20">        
                <input type="password" name="cpassword" placeholder="conform Password" class="password2" value="<?php echo $cpassword;?>">
                <span class="error">* <?php echo $cpasswordErr;?></span>
            </div>
            <div class="col-60">
            <input type="submit" name="submit" value="Submit">
            </div>    
        </div>     
    </form>
   <?php
    echo $passwordmatch;
    echo "<br>";
    echo $cpasswordmatch;
    echo "<br>";
   ?>
   
    </body>
</html>        