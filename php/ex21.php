<?php  
require_once('jpgraph/src/jpgraph.php');  
require_once('jpgraph/src/jpgraph_line.php');  
require_once('jpgraph/src/jpgraph_bar.php');  
$x_axis = array();  
$y_axis = array();  
$i      = 0;  
$con    = mysqli_connect("localhost", "root", "rOot@123!", "Exercise");  
// Check connection  
if (mysqli_connect_errno()) {  
    echo "Failed to connect to MySQL: " . mysqli_connect_error();  
}  
$result = mysqli_query($con, "SELECT designation, COUNT(id) FROM customer GROUP BY designation ORDER BY COUNT(id) DESC;");  
while ($row = mysqli_fetch_array($result)) {  
    $x_axis[$i] = $row["designation"];  
    $y_axis[$i] = $row["COUNT(id)"];  
    $i++;  
}  
mysqli_close($con);  
$width  = 900;  
$height = 400;  
$graph  = new Graph($width, $height);  
$graph->SetScale('textint');  
$graph->title->Set('Tathya Developer');  
$graph->xaxis->title->Set('(Technology)');  
$graph->xaxis->SetTickLabels($x_axis);  
$graph->yaxis->title->Set('(Number of Developer)');  
$barplot = new BarPlot($y_axis);  
$graph->Add($barplot);  
$graph->Stroke();  
?>  


