<!DOCTYPE html>
<html>
<head>
    <title>Value Search</title>
</head>
<body>
    <h2>Enter five numbers:</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            echo "Number $i: <input type='text' name='num[]'><br><br>";
        }
        ?>
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
            $position = linearSearch($nums, $searchValue);
            if ($position !== false) {
                echo "<h2>$searchValue is present at position: $position</h2>";
            } else {
                echo "<h2>$searchValue is not present in the array.</h2>";
            }
        } else {
            echo "<h2>Please enter valid numbers.</h2>";
        }
    }

    // linear search
    function linearSearch($arr, $x) {
        $n = count($arr);
        for ($i = 0; $i < $n; $i++) {
            if ($arr[$i] == $x) {
                return $i;
            }
        }
        return false; // Element not found
    }
    ?>
</body>
</html>
