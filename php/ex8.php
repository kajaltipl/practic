<?php
//# Current Time of New_York
$date = new DateTime("now", new DateTimeZone('America/New_York') );
echo $date->format('Y-m-d H:i:sa');
?>