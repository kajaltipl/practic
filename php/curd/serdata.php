<?php
include "conn.php";
if (isset($_POST['search_param'])) {
    $search_param = mysqli_real_escape_string($conn, $_POST['search_param']);
    $query = mysqli_query($conn, "SELECT * FROM product where p_name like '%$search_param%'  order by p_id limit 20");
    
    $output = '';
    if ($query->num_rows > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $output .= '<tr>
            
    <td><a href="#">' . $row['p_id'] . '</td>
    <td><a href="#">' . $row['p_name'] . '</td>
    <td><a href="#">' . $row['product_price'] . '</td>
    <td><a href="#">' . $row['p_desc'] . '</td>
 
  </tr>';
        }
    } else {
        $output = '
  <tr>
    <td colspan="4"> No result found. </td>   
  </tr>';
    }
    echo $output;
}
?>