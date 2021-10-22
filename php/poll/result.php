<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('jpgraph/src/jpgraph.php');  
require_once('jpgraph/src/jpgraph_line.php');  
require_once('jpgraph/src/jpgraph_bar.php');  
$x_axis = array();  
$y_axis = array();  
$i = 0; 
 
$con= mysqli_connect("localhost", "root", "rOot@123!", "Exercise");  
// Check connection  
if (mysqli_connect_errno()) {  
    echo "Failed to connect to MySQL: " . mysqli_connect_error();  
}  
$result = mysqli_query($con, "SELECT poll_op, COUNT(poll_id) FROM poll_1 GROUP BY poll_op ORDER BY poll_op DESC;");  
while ($row = mysqli_fetch_array($result)) {  
    $x_axis[$i] = $row["poll_op"];  
    $y_axis[$i] = $row["COUNT(poll_id)"];  
    $i++;  
}  
mysqli_close($con);  
$width  = 900;  
$height = 400;  
$graph  = new Graph($width, $height);  
$graph->SetScale('textint');  
$graph->title->Set('Poll Result');  
$graph->xaxis->title->Set('(Poll Options)');  
$graph->xaxis->SetTickLabels($x_axis);  
$graph->yaxis->title->Set('(Number of polling)');  
$barplot = new BarPlot($y_axis);  
$graph->Add($barplot);  
$graph->Stroke();  
?>