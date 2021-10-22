<?php
    session_start();
    //print_r($_SESSION);
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
      	  <label class="col-100">OTP</label><span class="error"> *<?php echo $emailErr;?></span> 
     </div>
     </div>
      <div class="row">
    	<div class="col-100">
        <input type="text" class="col-100"name="otp" placeholder="Enter OTP">
        <input type="hidden" class="col-100"name="checkotp" value=<?php echo $_SESSION['otp'];?>>
    </div>
    <div class="row">	
   		<input type="submit" name="submit" class="btn"value="Reset Password">
           
	  </div>
    </form>
</body>
</html>
<?php
     $_SESSION['otp'];
     if(isset($_POST['submit']))  
  {  
     $otp=$_POST['otp'];
     $checkotp=$_POST['checkotp'];
     if($otp==$checkotp)
     {
        echo
        "<script>window.open('resetpassword.php',)</script>";
     } 
     else
     {
        echo  "Invalid OTP";
     }
  }

?>