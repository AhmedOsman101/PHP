<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="index.php" method="post">
            <div class="mt-5 mb-3">
                <label class="form-label">Input:</label>
                <input type="text" class="form-control" name="value" placeholder="Enter a value">
            </div>
            <button type="submit" class="btn btn-success" value="submit">Submit</button>
        </form>
    </div>
    <?php
    $value = $_POST["value"];

    function removeZeros(string $str)
    {
        $result = "";
        $found = false;

        for ($i = 0; $i < strlen($str); $i++) { # loop from index 0 to length of the string - 1
            $item = $str[$i]; # $item is holding the number at the current position
            if ($item != 0) { # if we found a number other than 0, set $found variable to true
                $found = true;
            }
            if ($found) { # if $found is true, that means we skipped all the zeros on the left
                $result .= $item; # add the remaining numbers to the $result variable
            }
        }
        return $result;
    }

    function primeNum($num)
    {
        $result = "{$num} is prime";
        for ($i = 2; $i < $num; $i++) {
            if ($num % $i == 0) {
                $result = "{$num} is not prime";
                break;
            }
        }
        return $result;
    }

    function minMaxAvg($arr)
    {
        $min = 0;
        $max = null;
        $total = 0;
        // for ($item = 0; $item < sizeof($arr); $item++) {

        // }
        foreach ($arr as $item) {
            if ($item > $max) {
                $max = $item;
            } elseif ($item < $min) {
                $min = $item;
            }
            $total += $item;
        }
        $avg = $total / sizeof($arr);
        return [$min, $max, $avg];
    }
    list($min, $max, $avg) = minMaxAvg([100, 10, -20, -2, -20]);

    function strMethods($str)
    {
        return [substr($str, 0, 6), str_replace("ohman", "Othman", $str), strpos($str, "t"), trim($str, "n")];
    }

    function removeZeros2($str)
    {
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++) {
            if ($str[$i] != 0) {
                return substr($str, $i, $len);
            }
        }
    }

    function missingNumber($start, $end, $arr)
    {
        $res = [];
        $fullArr = [];
        for ($i = $start; $i <= $end; $i++) {
            array_push($fullArr, $i);
        }

        foreach ($fullArr as $num) {
            $missing = true;
            foreach ($arr as $val) {
                if ($num == $val) {
                    $missing = false;
                    break;
                }
            }
            if ($missing) {
                array_push($res, $num);
            }
        }
        return $res;
    }
    echo "res: ";
    echo implode("...", missingNumber(1, 10, [2, 4, 6, 8, 10]));
    // echo ("<h1 class='text-center'> Output: " . removeZeros($value) . "</h1>");
    // echo ("<h1 class='text-center'> Output: " . primeNum($value) . "</h1>");
    // echo ("<h1 class='text-center'> Output: " . "Min: " . $min . ", Max: " . $max . ", Avg: " . $avg . "</h1>");
    // list($sub, $rep, $pos, $trim) = strMethods($value);
    // echo ("<h1 class='text-center'> Output: " . "sub: " .  $sub . "<br>rep: " . $rep . "<br>pos: " . $pos . "<br>trim: " . $trim . "</h1>");
    // echo ("<h1 class='text-center'> Output: " . removeZeros2($value) . "</h1>");
    ?>
</body>

</html>