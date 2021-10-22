 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
 
</br>
<?php
      include "conn.php";
     //$link = mysqli_connect("localhost", "root", "rOot@123!", "Exercise");
 
     // Check connection
     //if($link === false){
        // die("ERROR: Could not connect. " . mysqli_connect_error());
    // }
    
    $sql = "SELECT * FROM customer";
    //$query = mysql_query("select * from customer");
      
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table border=1>";
                echo "<tr>";
                    echo "<th>id</th>";
                    echo "<th>name</th>";
                    echo "<th>designation</th>";
                    echo "<th>date</th>";
                    echo "<th>created_at</th>";
                    echo "<th>status</th>";
                     
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['designation'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    
                echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
     
    // Close connection
    mysqli_close($conn);

    
    ?>

 
 
</body>
</html>