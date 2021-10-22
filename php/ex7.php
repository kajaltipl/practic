<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex-7</title>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $date1=$_POST["date1"];
        $date2=$_POST["date2"];


$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
//$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/(60*24));

printf("The Difference Between Two Dates are %d years, %d months, %d days  \n", $years, $months, $days);
    }
       

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</head>
<body>
    <form method="post">
        <label for="date1">date 1</label><br>
        <input type="date" name="date1" placeholder="Please Enter Date1"><br>
        <label for="date1">date 2</label><br>
        <input type="date" name="date2" placeholder="Please Enter Date2">
        <br>
        <input type="submit" name="submit" value="submit">
        
    </form>
</body>
</html>