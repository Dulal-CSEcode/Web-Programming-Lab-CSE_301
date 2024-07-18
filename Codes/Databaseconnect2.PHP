<?php

$hostname='localhost';

$username='root';

$userpass='';

// Create connection

$conn = mysqli_connect($hostname,$username,$userpass);

// Check connection

if (!$conn) {

die("Connection failed: " . mysqli_connect_error());

}

echo "Connected successfully";

?>