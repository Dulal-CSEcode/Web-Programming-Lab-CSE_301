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
    // bubble sort
    function bubbleSort(&$arr) {
        $n = count($arr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    // swap arr[j] and arr[j+1]
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
    }
    // binary search
    function binarySearch($arr, $x) {
        $left = 0;
        $right = count($arr) - 1;     
        while ($left <= $right) {
            $mid = $left + floor(($right - $left) / 2);          
            // present at mid
            if ($arr[$mid] == $x) {
                return $mid;
            }            
            //x greater, ignore left half
            if ($arr[$mid] < $x) {
                $left = $mid + 1;
            }           
            //x is smaller, ignore right half
            else {
                $right = $mid - 1;
            }
        }       
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
            
            // Find positions of second min and second max
            $secondMinPos = binarySearch($nums, $secondMin);
            $secondMaxPos = binarySearch($nums, $secondMax);
            
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
