<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
 <div border ="2"> 
<?php
if ($_POST) // If form was submited...
{
    $day = $_POST["day"];
}
 ?>
<form method="post">
    <input type="number" name="day" placeholder="enter the day">
    <input type="submit" value="Go!" />
    </br>
     
</form>
<?php 
    $date = date('Y-m-d', strtotime('+' .$day. 'day'));
    echo $date; 
?>
</body>
</html>

 
     