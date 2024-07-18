<?php

$hostname='localhost';

$username='root';

$userpass='';

// Create connection

$conn = mysqli_connect($hostname, $username, $userpass);

// Check connection


if (!$conn) {

die("Connection failed: " . mysqli_connect_error());

}

// Create database

$sql = "CREATE DATABASE DULAL_web2";

if (mysqli_query($conn, $sql)) {

echo "Database created successfully";

} else {

echo "Error creating database: " . mysqli_error($conn);

}

mysqli_close($conn);

?>