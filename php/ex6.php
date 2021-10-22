
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex-6</title>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date1 = $_POST["date1"];
        $date2 = date("Y-m-d H:i:s");
       
        $diff = abs(strtotime($date2) - strtotime($date1));

        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
        $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
        printf("You are Old %d years, %d months, %d days, %d hours, %d minutes,%d seconds, \n", $years, $months, $days,$hours,$minutes,$seconds);
    }


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</head>

<body>
    <form method="POST">
    <label for="date1">Date of birth</label><br>
        <input type="date" name="date1" placeholder="Please Enter Your Date of Birth"><br>
       
        <input type="submit" name="submit" value="submit">
        
    </form>
</body>

</html>
