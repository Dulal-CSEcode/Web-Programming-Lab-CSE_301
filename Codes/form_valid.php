<?php
$hostname = 'localhost';
$username = 'root';
$userpass = '';
$dbname = 'dulal_web';

$conn = mysqli_connect($hostname, $username, $userpass, $dbname);
mysqli_select_db($conn, $dbname);

<html>
<form action="" method="POST">
    Name: <br>;
    <input type="text" name="name">
    <input type="submit" name="submit">
</form>
</html>
?>
<?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']); 
    $q = "INSERT INTO student (name) VALUES ('$name')";
    $run = mysqli_query($conn, $q);

    if ($run) {
        echo 'Done.';
    } else {
        echo 'not working.';
    }
}
?>

