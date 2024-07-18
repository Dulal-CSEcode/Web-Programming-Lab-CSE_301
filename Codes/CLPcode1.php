<!DOCTYPE html>
<html>
<head>
    <title>Value Search</title>
</head>
<body>
    <h2>Enter five numbers:</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Number 1: <input type="text" name="num[]" required><br><br>
        Number 2: <input type="text" name="num[]" required><br><br>
        Number 3: <input type="text" name="num[]" required><br><br>
        Number 4: <input type="text" name="num[]" required><br><br>
        Number 5: <input type="text" name="num[]" required><br><br>
        Search Value: <input type="text" name="searchValue" required><br><br>
        <input type="submit" name="submit" value="Search">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nums = $_POST['num'];
        $searchValue = $_POST['searchValue'];
        
        // Check if inputs are numeric
        $validInputs = true;
        foreach ($nums as $num) {
            if (!is_numeric($num)) {
                $validInputs = false;
                break;
            }
        }
        
        if ($validInputs) {
            $position = array_search($searchValue, $nums);
            if ($position !== false) {
                echo "<h2>$searchValue is present at position: $position</h2>";
            } else {
                echo "<h2>$searchValue is not present in the array.</h2>";
            }
        } else {
            echo "<h2>Please enter valid numbers.</h2>";
        }
    }
    ?>
</body>
</html>
