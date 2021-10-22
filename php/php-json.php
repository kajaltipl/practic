
<!DOCTYPE html>
<html>
<body>

<?php
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

$obj = json_decode($jsonobj);

echo $obj->Peter;
echo $obj['Peter'];
linebreak();
echo $obj->Ben;
linebreak();
echo $obj->Joe;
function linebreak() {
    echo "<hr><br>";
}
?>

</body>
</html>
