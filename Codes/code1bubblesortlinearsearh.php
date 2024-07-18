<!DOCTYPE html>
<html>
<head>
    <title>Array Operations</title>
</head>
<body>
    <h2>Enter ten numbers:</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "Number $i: <input type='text' name='num[]'><br><br>";
        }
        ?>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    // Bubble sort
    function bubbleSort(&$arr) {
        $n = count($arr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    // Swap arr[j] and arr[j+1]
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
    }

    // Linear search
    function linearSearch($arr, $x) {
        $n = count($arr);
        for ($i = 0; $i < $n; $i++) {
            if ($arr[$i] == $x) {
                return $i;
            }
        }
        // If the element is not found, return -1
        return -1;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nums = $_POST['num'];
        
        // Check if inputs are numeric
        $validInputs = true;
        foreach ($nums as $num) {
            if (!is_numeric($num)) {
                $validInputs = false;
                break;
            }
        }
        
        if ($validInputs) {
            // Perform bubble sort
            bubbleSort($nums);
            
            // Find second minimum and second maximum
            $secondMin = $nums[1];
            $secondMax = $nums[count($nums) - 2];
            
            // Find positions of second min and second max using linear search
            $secondMinPos = linearSearch($nums, $secondMin);
            $secondMaxPos = linearSearch($nums, $secondMax);
            
            // Swap positions of second min and second max
            $temp = $nums[$secondMinPos];
            $nums[$secondMinPos] = $nums[$secondMaxPos];
            $nums[$secondMaxPos] = $temp;
            
            // Print new array
            echo "<h2>New array after swapping:</h2>";
            foreach ($nums as $num) {
                echo "$num ";
            }
        } else {
            echo "<h2>Please enter valid numbers.</h2>";
        }
    }
    ?>
</body>
</html>
