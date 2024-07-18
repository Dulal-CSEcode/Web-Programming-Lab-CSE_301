<?php

$hostname='localhost';

$username='root';

$userpass='';

$dbname = 'dulal_web';

// Create connection

$conn = mysqli_connect($hostname, $username, $userpass, $dbname);

mysqli_select_db($conn,$dbname);

?>

<html>

<form action="form_valid.php" method="POST">

Name: <br>

<input type="text" name="name"> </input>

<input type="submit" name="submit"> </input>

</form>

</html>