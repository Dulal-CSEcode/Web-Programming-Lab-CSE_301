<?php

$hostname = 'localhost';
$username = 'root';
$userpass = '';
$dbname = 'dulal_web';

// Create connection
$conn = mysqli_connect($hostname, $username, $userpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

<html>
<head>
    <title>Form Submission</title>
</head>
<body>

<form action="form_valid.php" method="POST">
    Name: <br>
    <input type="text" name="name" /> <!-- corrected input tag -->
    <input type="submit" name="submit" /> <!-- corrected input tag -->
</form>

<?php
if(isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);

    if (!empty($name)) {
        $q = "INSERT INTO student (name) VALUES (?)";
        
        $stmt = mysqli_prepare($conn, $q);
       
        mysqli_stmt_bind_param($stmt, "s", $name);
        

        if (mysqli_stmt_execute($stmt)) {
            echo 'Record inserted successfully.';
        } else {
            echo 'Error inserting record: ' . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo 'Name cannot be empty.';
    }
}
?>

</body>
</html>
<?php
// Close connection
mysqli_close($conn);
?>
