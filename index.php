<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
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
    // $value = $_POST["value"];

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

    function mini($arr)
    {
        $min = 0;
        foreach ($arr as $item) {
            if ($item < $min) {
                $min = $item;
            }
        }
        return $min;
    }
    function maxi($arr)
    {
        $max = null;
        foreach ($arr as $item) {
            if ($item > $max) {
                $max = $item;
            }
        }
        return $max;
    }
    // list($min, $max, $avg) = minMaxAvg([100, 10, -20, -2, -20]);

    function strMethods($str)
    {
        return [substr($str, 0, 6), str_replace("ohman", "Othman", $str), strpos($str, "t"), trim($str, "n")];
    }
    // list($sub, $rep, $pos, $trim) = strMethods($value);

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

    function mathss($num)
    {
        return [
            number_format($num * pi(), 2),
            number_format(deg2rad($num), 2),
            number_format(rad2deg($num), 2),
            round($num, 1, PHP_ROUND_HALF_UP)
        ];
    }

    function workshop2()
    {
        echo ("<h1 class='text-center'> Output: " . substr("hotmail.com", -3, 3) . "</h1>");
        echo ("<h1 class='text-center'> Output: " . str_replace("o", "hotmail", 0) . "</h1>");
    }


    
    // workshop2();
    // echo ("<h1 class='text-center'> Output: " . primeNum($value) . "</h1>");
    // echo ("<h1 class='text-center'> Output: " . implode("...", missingNumber(1, 10, [2, 4, 6, 8, 10])) . "</h1>");
    // echo ("<h1 class='text-center'> Output: " . "sub: " .  $sub . "<br>rep: " . $rep . "<br>pos: " . $pos . "<br>trim: " . $trim . "</h1>");
    // echo ("<h1 class='text-center'> Output: " . removeZeros2($value) . "</h1>");
    // list($PI, $RAD, $DEG, $roundd) = mathss(5.55);
    // echo ("<h1 class='text-center'> Output: " . $PI . " <br> " . $RAD . " <br> ". $DEG . " <br> ". $roundd . "</h1>");
    // print_r (explode(",", "1,2,3,4,5"));
    ?>
</body>

</html>