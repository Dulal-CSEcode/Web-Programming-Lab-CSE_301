<!DOCTYPE html>
<html>
<head>
    <title>Sum Calculator</title>
</head>
<body>
    <h2>Enter two numbers to find their sum:</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Number 1: <input type="text" name="num1"><br><br>
        Number 2: <input type="text" name="num2"><br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        
        // Check if inputs are numeric
        if (is_numeric($num1) && is_numeric($num2)) {
            $sum = $num1 + $num2;
            echo "<h2>The sum of $num1 and $num2 is: $sum</h2>";
        } else {
            echo "<h2>Please enter valid numbers.</h2>";
        }
    }
    ?>
</body>
</html>
