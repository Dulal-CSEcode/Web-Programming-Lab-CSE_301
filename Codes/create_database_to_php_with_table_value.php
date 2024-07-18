<?php

$hostname='localhost';

$username='root';

$userpass='';

$dbname = 'dulal_web';

// Create connection

$conn = mysqli_connect($hostname, $username, $userpass,
$dbname);

// Check connection

if (!$conn) {

die("Connection failed: " . mysqli_connect_error());

}

$sql = "INSERT INTO student(firstname, lastname, email)

VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql)) {

echo "New record created successfully";

} else {

echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

mysqli_close($conn);

?>