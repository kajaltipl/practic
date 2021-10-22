<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
//$_SESSION["favcolor"] = "Purple";
?>
<?php
echo "<pre>";
print_r($_SESSION);
echo "<hr>";
print_r($_COOKIE);
var_dump($_COOKIE);
?>
</body>
</html>