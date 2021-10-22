<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("note.xml");

$x = $xmlDoc->documentElement;
echo "<pre>";
foreach ($x->childNodes AS $item) {
  var_dump($item);
}
?>