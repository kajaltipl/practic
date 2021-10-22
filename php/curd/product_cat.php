<?php
// Create database connection using config file
include_once("conn.php");
$query = "select * from pro_cat where parent_cat_id = 0";
    $resultcat = mysqli_query($conn,$query);
    $data = array();
    while($row = mysqli_fetch_array($resultcat)) {
        $data[$row['c_id']] = $row['c_name'];

    }
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM pro_cat Order By parent_cat_id ASC, c_name ASC ");
?>

<html>
<head>
    <title>category</title>
</head>

<body>
<a href="product_cat_insert.php">Add New Category</a><br/><br/>

    <table width='80%' border=1>

    <tr>
    <th>c_id</th> <th>c_name</th> <th>parent_cat_id</th><th>p_status</th> <th>Action</th>
    </tr>
    <tr><td colspan = 3><?php echo $_GET['msg'] != "" ? $_GET['msg'] : "";?></td></tr>
    <?php
    while($user_data = mysqli_fetch_array($result)) {
       $mystatus =  $user_data['c_status'] == 1 ? "Active":"Deactive";
        echo "<tr>";
        echo "<td>".$user_data['c_id']."</td>";
        echo "<td>".$user_data['c_name']."</td>";
        echo "<td>".$data[$user_data['parent_cat_id']]."</td>";
        echo "<td>".$mystatus."</td>";
        echo "<td><a href='product_cat_edit.php?c_id=$user_data[c_id]'>Edit</a> | <a href='product_cat_delete.php?c_id=$user_data[c_id]' onclick=\"return confirm('Are you Sure Wants to Delete');\" >Delete</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>