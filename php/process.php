<?php
// connect to the database
include('conn.php');


$cnt = count($_POST['name']);
$cnt2 = count($_POST['designation']);

if ($cnt > 0 && $cnt == $cnt2) {
    $insertArr = array();
    for ($i=0; $i<$cnt; $i++) {
        $insertArr[] = "('" . mysql_real_escape_string($_POST['name'][$i]) . "', '" . mysql_real_escape_string($_POST['designation'][$i]) . "')";
}

 $query = "INSERT INTO customer (name, designation) VALUES " . implode(", ", $insertArr);
 mysql_query($query) or trigger_error("Insert failed: " . mysql_error());
}

echo("<pre>\n");
print_r($_POST);
echo("</pre>\n");




mysql_close($connection);
?> 