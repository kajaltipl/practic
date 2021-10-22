<?php

include "conn.php";
if (isset($_POST['search_param'])) {
    $search_param = mysqli_real_escape_string($conn, $_POST['search_param']);
    $query = mysqli_query($conn, "SELECT * FROM customer where name like '%$search_param%'  order by id limit 20");
    $output = '';
    if ($query->num_rows > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $output .= '<tr>
            
    <td>' . $row['id'] . '</td>
    <td>' . $row['name'] . '</td>
    <td>' . $row['designation'] . '</td>
    <td>' . $row['date'] . '</td>
    <td>' . $row['created_at'] . '</td>
    <td>' . $row['status'] . '</td>
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