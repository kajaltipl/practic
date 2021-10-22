<?php
    include 'conn.php'
?>
<!DOCTYPE HTML>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
<style>
.error {color: #FF0000;}
</style>
</head>

    <h1>Add user</h1>
 <form method="post" action="">

 <table>
    <thead>
        <th>Name</th>
        <th>Designation</th>
    </thead>

  
        <input name="name" type="text" />
        <input name="designation" type="text" />
    

   
</table>

 <input type="submit" name="submit" value="submit" />
 </form>
    <?php
     
    // print_r($designation);
  
        for($i = 0; $i<10; $i++) {
            $name = $_POST['name'];
            $designation= $_POST['designation'];
        $sql="INSERT INTO customer(name,designation) VALUES ('$name','$designation')";
        if(mysqli_query($conn, $sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
      //  $result = mysqli_query($sql);
      //  print_r(mysqli_query($sql));
        
    }
     
    ?>
    
</body>
</html>

