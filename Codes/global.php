<!DOCTYPE html>

<html>

<body>

<?php

$x = 5;

$y = 10;

function myTest() {

global $x, $y;

$y = $x + $y;

}
echo $y; // output the new value for variable $y
myTest(); // run function
echo "<br>";
echo $y; // output the new value for variable $y

?>

</body>

</html>