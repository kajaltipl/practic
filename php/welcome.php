<?php
session_start();
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1> Welcome  <?php echo $_SESSION["email"] ?> </h1>
    <?php
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
      $mail->Body    = 'Email Testing  Welcome to TathyaInfotech '.$reciver;
  
      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) { // handle error.
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
  ?>
</body>
</html>