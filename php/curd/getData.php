<?php

include 'conn.php';

$data = json_decode(file_get_contents("php://input"));

$task = $data->task;

$response = array();
// get all products
if($task == 1){
    $query = 'select * from product order by product_price asc';
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result) ){
        $response[] = $row;
    }
}

// filter products by price
if($task == 2){
    $min = $data->min;
    $max = $data->max;

    $query = 'select * from product where product_price between "'.$min.'" and "'.$max.'" order by product_price asc';
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result) ){
        $response[] = $row;
    }
}

echo json_encode($response);