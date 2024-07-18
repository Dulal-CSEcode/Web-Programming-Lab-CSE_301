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

// sql to create table

$sql = "CREATE TABLE student (

id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

firstname VARCHAR(30) NOT NULL,

lastname VARCHAR(30) NOT NULL,

email VARCHAR(50),

reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON
UPDATE CURRENT_TIMESTAMP

)";
if (mysqli_query($conn, $sql)) {

echo "Table student created successfully";

} else {

echo "Error creating table: " . mysqli_error($conn);

}

mysqli_close($conn);

?>