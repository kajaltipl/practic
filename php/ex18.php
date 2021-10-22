<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// PHPMailer classes into the global namespace
// Base files 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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
    $mail->addAddress('pateldhruv21500@gmail.com', "Receiver");  // receiver's email and name

    $mail->Subject = 'Email Testing Welcome to TathyaInfotech';
    $mail->Body    = 'Email Testing  Welcome to TathyaInfotech  Welcome to TathyaInfotech  Welcome to TathyaInfotech  Welcome to TathyaInfotech';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) { // handle error.
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>