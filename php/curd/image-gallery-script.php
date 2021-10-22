<?php
require_once('conn.php');
$db=$conn; // Enter your Connection variable;
$tableName='gallery'; // Enter your table Name;
$fetchImage= fetch_image($tableName);
      // fetching padination data
function fetch_image($tableName){
   global $db;
  // print_r($db);
   $tableName= trim($tableName);
   if(!empty($tableName)){
  $query = "SELECT * FROM ".$tableName." ORDER BY id DESC";
 
  $result = $db->query($query);
 // print_r($result);
if ($result->num_rows > 0) {
    $row= $result->fetch_all(MYSQLI_ASSOC);
   // print_r($row);    
    return $row;
      
  }else{
    
    echo "No Image is stored in the database";
  }
}else{
  echo "you must declare table name to fetch Image";
}
}  
