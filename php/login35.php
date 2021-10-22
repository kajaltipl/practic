<?php
session_start();//session starts here  
?> 

<?php
 $emailErr = "";
 $email ="";
 $pwdErr="";
 $password ="";
 if($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  
  if (empty($_POST["pass"])) {
    $pwdErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
   $email = test_input($_POST["email"]);
   $password = test_input($_POST["password"]);
  
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<DOCTYPE html>
<html>
<head>
	<style>
*{
	box-sizing: border-box;

  }
.row{
    	width: 100%;
    	padding: 3px;

    }
 .col-100
 	{
 	width: 90%;
 	box-sizing: border-box;
 	padding: 5px;

	}
 .lablecolor
 {
 	color:dimgray;
 	padding: 5px;
 }
 
 .btn
 {
    background-color: blue;
    height: 25px;
    border-radius: 5px;
    color: white;
   

 }
 .inline{
 	display: inline-flex;
 	margin: 10px;
 }
  .error {color: #FF0000;}
</style>
</head>
<body>
	<form method="post" action=""> 
    <div class="row">
    <div>
      	  <label class="col-100">Email</label><span class="error"> *<?php echo $emailErr;?></span> 
     </div>
     </div>
      <div class="row">
    	<div class="col-100">
        <input type="text" class="col-100"name="email"placeholder="Enter Email">
    </div>
    
    <div>
    	<div class="row">
    		 <label class="col-100">Password</label><span class="error"> *<?php echo $pwdErr;?></span>	
    		</div>
    </div>
    <div>
    	<div class="col-100">
    		 <input type="text" class="col-100"name="pass" type="password" value="" placeholder="Password">
    	</div>
    </div>
    
     <div class="row">	
   		<input type="submit" name="submit" class="btn"value="Login">
       <a href="forgot.php"> forgot password </a>
	  </div>
    </form>

  
</body>

</html>
 


<?php  
include("conn.php");  
  
  if(isset($_POST['submit']))  
  {  
      $user_email=$_POST['email'];  
      $user_pass=$_POST['pass'];  
   
    
      $check_user="select * from customer_reg WHERE email='$user_email'AND password='$user_pass'";  
     
      $run=mysqli_query($conn,$check_user);  
    
      if(mysqli_num_rows($run))  
       {  
          echo "<script>window.open('ex35.php','_self')</script>";  
          
          $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.  
    
      }  
      else  
      {  
        echo "<script>alert('Email or password is incorrect!')</script>";  
      }  
  }  
  ?>  
  



