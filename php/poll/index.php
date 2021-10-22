<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <div>
            <lable>enter your ans</lable></br>
            <input type="text" name="title" value="enter poll">
            Php:
            <input type="radio" name="vote" value="php">
            .Net:
            <input type="radio" name="vote" value=".net">
            Laravel
            <input type="radio" name="vote" value="laravel">
            Java
            <input type="radio" name="vote" value="java">
            <input type="submit" name="submit" value="submit">
            <a href="result.php" >result</a>
        </div>
    </form>
    <?php 
    include "conn.php";
    $title=$_POST['title'];
    $radio=$_POST['vote'];
    print_r($title,$radio);
    $sql="INSERT INTO `poll_1`( `poll_title`,`poll_op`) VALUES ('$title','$radio')";
   // print_r($sql); 

    if(mysqli_query($conn, $sql)){
        echo "<h3>data stored in a database successfully."; 
            

        
    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($conn);
    }
      
    // Close connection
    mysqli_close($conn);
    ?>
</body>
</html>