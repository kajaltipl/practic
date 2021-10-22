<?php
session_start();//session starts here  

?> 
<!DOCTYPE html>
<html lang="en">
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
        <input type="text" class="col-100"name="email" placeholder="Enter Email">
    </div>
    <div class="row">	
   		<input type="submit" name="submit" class="btn"value="Send OTP">
           
	  </div>
    </form>
</body>
</html>
<?php  

include("conn.php");  
  
  if(isset($_POST['submit']))  
  {  
      $user_email=$_POST['email'];
      $generator = "1357902468";
      $otp = ""; 
      $n=6;
      for ($i = 1; $i <= $n; $i++) {
        $otp .= substr($generator, (rand()%(strlen($generator))), 1);
    }
    print_r($_SESSION);
     $_SESSION['otp']=$otp;     
      $check_user="select * from customer_reg WHERE email='$user_email'";  
     
      $run=mysqli_query($conn,$check_user);  
      
      if(mysqli_num_rows($run))  
      {  
          echo "<script>window.open('otp.php')</script>";  

           $_SESSION["email"];//here session is used and value of $user_email store in $_SESSION.  
          
      }  
      else  
      {  
        echo "<script>alert('Email  is incorrect!')</script>";  
      }  
  }
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  $reciver=$_SESSION["email"];
  require_once "vendor/autoload.php"; //PHPMailer Object 
  $mail = new PHPMailer(true);                             
  try {
      $mail->isSMTP(); // using SMTP protocol                                     
      $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
      $mail->SMTPAuth = true;  // enable smtp authentication                             
      $mail->Username = 'tathyainfotechtest@gmail.com';  // sender gmail host              
      $mail->Password = 'Tipl#12345!'; // sender gmail host password                          
      $mail->SMTPSecure = 'tls';  // for encrypted connection                           
      $mail->Port = 587;   // port for SMTP     
  
      $mail->setFrom('tathyainfotechtest@gmail.com', "Sender"); // sender's email and name
      $mail->addAddress($reciver, "Receiver");  // receiver's email and name
  
      $mail->Subject = 'Email Testing Welcome to TathyaInfotech';
      $mail->Body    = 'Email Testing  Welcome to TathyaInfotech '.$otp;
  
      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) { // handle error.
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
  
  ?>  