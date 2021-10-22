<?php
// Create database connection using config file
include_once("conn.php");

// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM product ORDER BY p_id  DESC");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New Product</a><br/><br/>

    <table width='80%' border=1>

    <tr>
    <th>p_id</th> <th>p_name</th> <th>p_desc</th> <th>p_img</th><th>p_status</th><th>pro_cat_id</th> <th>Action</th>
    </tr>
    <?php
    while($user_data = mysqli_fetch_array($result)) {
        $mystatus =  $user_data['p_status'] == 1 ? "Active":"Deactive";
        echo "<tr>";
        echo "<td>".$user_data['p_id']."</td>";
        echo "<td>".$user_data['p_name']."</td>";
        echo "<td>".$user_data['p_desc']."</td>";
       
        echo "<td>"."<img src= images/".$user_data['p_img']." width=100 height=100/></td>";
         
        echo "<td>".$mystatus."</td>";
        echo "<td>".$user_data['pro_cat_id']."</td>";
        echo "<td><a href='edit.php?p_id=$user_data[p_id]'>Edit</a> | <a href='delete.php?p_id=$user_data[p_id]'>Delete</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>