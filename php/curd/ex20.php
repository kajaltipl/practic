<?php
// Create database connection using config file
include_once("conn.php");
//$query = "select * from pro_cat where parent_cat_id = 0";
     
echo "<h1>Display Parents Category Wise Product Count</h1>";
$result = mysqli_query($conn, "SELECT pro_cat_id,c_name,parent_cat_id,COUNT(*)
FROM pro_cat
INNER JOIN product
ON pro_cat.c_id = product.pro_cat_id GROUP BY pro_cat_id,c_name,parent_cat_id ");
?>
<html>
<head>
    <title>category</title>
</head>

<body>
    <table width='80%' border=1>
    <tr>
    <th>pro_cat_id</th> <th>c_name</th> <th>parent_cat_id</th><th>Total product</th>  
    </tr>
    <tr><td colspan = 3><?php echo $_GET['msg'] != "" ? $_GET['msg'] : "";?></td></tr>
    <?php
    while($user_data = mysqli_fetch_array($result)) {
       
        echo "<tr>";
        echo "<td>".$user_data['pro_cat_id']."</td>";
        echo "<td>".$user_data['c_name']."</td>";
        echo "<td>".$user_data['parent_cat_id']."</td>";
        echo "<td>".$user_data['COUNT(*)']."</td>";
         
     }
    ?>
    </table>

   <?php echo "<h1>Display Status Wise Product Count</h1>";
    $result1 = mysqli_query($conn, "SELECT p_status,COUNT(*) FROM product GROUP BY p_status");
    ?>

    <table width='80%' border=1>
    <tr>
    <th>p_status</th> <th>Total product</th>  
    </tr>
    <tr><td colspan = 3><?php echo $_GET['msg'] != "" ? $_GET['msg'] : "";?></td></tr>
    <?php
    while($user_data = mysqli_fetch_array($result1)) {
       
        echo "<tr>";
        echo "<td>".$user_data['p_status']."</td>";
        echo "<td>".$user_data['COUNT(*)']."</td>";
        }
    ?>
    </table>

    <?php echo "<h1>Display Category Wise Product Count</h1>";
    $result2 = mysqli_query($conn, "SELECT pro_cat_id,c_name,COUNT(*)
    FROM pro_cat
    INNER JOIN product
    ON pro_cat.c_id = product.pro_cat_id GROUP BY pro_cat_id,c_name;");
    ?>

    <table width='80%' border=1>
    <tr>
        <th>c_name</th> <th>Total product</th>  
    </tr>
    <tr><td colspan = 3>
        <?php echo $_GET['msg'] != "" ? $_GET['msg'] : "";?></td></tr>
    <?php
    while($user_data = mysqli_fetch_array($result2)) {
       
        echo "<tr>";
        //echo "<td>".$user_data['pro_cat_id']."</td>";
        echo "<td>".$user_data['c_name']."</td>";
        echo "<td>".$user_data['COUNT(*)']."</td>";
        }
    ?>
    </table>

</body>
</html>