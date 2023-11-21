<?php
function mostActive($customers)
{
    $n = count($customers);
    $res = [];
    $counts = array_count_values($customers);
    foreach ($counts as $customer => $count) {
        if (5 < ($count / $n) * 100) {
            array_push($res, $customer);
        }
    }
    sort($res);
    print_r($res);
}

function minTime(array $files, int $numCores, int $limit)
{
    if ($numCores == 0) {
        return; // or throw an exception
    }
    $executeTime = 0;
    $divs = [];
    foreach ($files as $lines) {
        if ($lines % $numCores == 0) {
            array_push($divs, $lines);
        } else {
            $executeTime += $lines;
        }
    }
    rsort($divs);
    for ($i = 0; $i < sizeof($divs); $i++) {
        if ($i != $limit) {
            $executeTime += ($divs[$i] / $numCores);
        } else {
            $executeTime += $divs[$i];
        }
    }
    return $executeTime;
}

function plusMinus($arr)
{
    // Write your code here
    $minus = 0;
    $zeros = 0;
    $plus = 0;
    foreach ($arr as $num) {
        if ($num < 0) {
            $minus++;
        } elseif ($num == 0) {
            $zeros++;
        } else {
            $plus++;
        }
    }

    $minus = number_format(($minus / sizeof($arr)), 6);
    $zeros = number_format(($zeros / sizeof($arr)), 6);
    $plus = number_format(($plus / sizeof($arr)), 6);
    echo "{$plus}\n{$minus}\n{$zeros}\n";
}

function miniMaxSum($arr)
{
    $minSum = 0;
    $maxSum = 0;
    sort($arr);
    for ($i = 0; $i < 4; $i++) {
        $minSum += $arr[$i];
    }
    rsort($arr);
    for ($i = 0; $i < 4; $i++) {
        $maxSum += $arr[$i];
    }
    print "{$minSum} {$maxSum}\n";
}

function timeConversion($s)
{
    $time = "";
    list($hrs, $mins, $sec) = explode(":", $s);
    if ($sec[-2] == "A") {
        if ($hrs == 12) {
            $hrs = "00";
        }
        $sec = trim($sec, "AM");
    } elseif ($sec[-2] == "P") {
        if ($hrs == 12) {
            $hrs = "12";
        } else {
            $hrs += 12;
        }
        $sec = trim($sec, "PM");
    }
    $time .= "{$hrs}:{$mins}:{$sec}\n";
    return $time;
}

function findMedian($arr)
{
    sort($arr);
    return $arr[sizeOf($arr) / 2];
    // [1, 2, 3, 4, 5]
}

function replaceVar()
{
    $x = 5;
    $y = 8;
    [$x, $y] = [$y, $x];
    echo "x: {$x} y: {$y}";
}

function lonelyInteger($a)
{
    $count = array_count_values($a);
    foreach ($count as $key => $value) {
        if ($value == 1) {
            return $key;
        }
    }
    return "none";
}

function challenge($s)
{
    @$res = explode($s[(strlen($s) / 2)], $s);
    if ($res[0] == strrev($res[1])) {
        return "true";
    } else {
        return "false";
    }
    // if (strlen($s) % 2 != 0) {
    // } 
    // else {
    //     $right = "";
    //     $left = "";
    //     for ($i=0; $i < strlen($s); $i++) { 
    //         if ($i<(strlen($s)/2)) {
    //             $left .= $s[$i];
    //         }else{
    //             $right .= $s[$i];
    //         }
    //     }
    //     if ($left == strrev($right)) {
    //         return "true";
    //     }else {
    //         return "false";
    //     }
    // }

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
// echo min([1, 5, 8, 0, -1, 5]);
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

function sorting($arr, $mode)
{
    $arrLen = sizeof($arr);
    $sortedArray = [];
    $sorted = false;
    // if ($mode == "desc"){
    //     array_push($sortedArray, mini($arr));
    //     print_r($sortedArray);
    // }else{
    //     array_push($sortedArray, maxi($arr));
    // }
    if ($arrLen == sizeof($sortedArray)) {
    } else {
        if ($mode == "desc") {
            // echo(maxi($arr));
            array_splice($sortedArray, 0, 0, maxi($arr));
            unset($arr[array_search(maxi($arr), $arr)]);
            // print_r($arr);
            print_r($sortedArray);
        } else {
        }
    }
}
// sorting([1, 5, 8, 0, -1, 5], "desc");

function quickSort($arr, $mode)
{
    if (sizeof($arr) <= 1) {
        return $arr;
    }
    $pointer = $arr[sizeof($arr) - 1];
    $left = [];
    $middle = [];
    $right = [];
    foreach ($arr as $val) {
        if ($val < $pointer) {
            array_push($left, $val);
        } elseif ($val > $pointer) {
            array_push($right, $val);
        } else {
            array_push($middle, $val);
        }
    }
    if ($mode == "desc") {
        return array_reverse(array_merge(quickSort($left, "asc"), $middle, quickSort($right, "asc")));
    } elseif ($mode == "asc") {
        return array_merge(quickSort($left, "asc"), $middle, quickSort($right, "asc"));
    } else {
        return "invalid input";
    }
}



function selectionSort($arr, $mode)
{
    if ($mode == "desc") {
        for ($i = 0; $i < sizeof($arr); $i++) {
            for ($j = ($i + 1); $j < sizeof($arr); $j++) {
                if ($arr[$j] > $arr[$i]) {
                    [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
                }
            }
        }
    } elseif ($mode == "asc") {
        for ($i = 0; $i < sizeof($arr); $i++) {
            for ($j = ($i + 1); $j < sizeof($arr); $j++) {
                if ($arr[$j] < $arr[$i]) {
                    [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
                }
            }
        }
    } else {
        return "invalid input";
    }

    return $arr;
}

function reverse_words_order_and_swap_cases($str)
{
    $str = explode(" ", $str);
    for ($i = 0; $i < sizeof($str); $i++) {
        for ($j = 0; $j < strlen($str[$i]); $j++) {
            if (ctype_lower($str[$i][$j])) {
                $str[$i][$j] = strtoupper($str[$i][$j]);
            } elseif (ctype_upper($str[$i][$j])) {
                $str[$i][$j] = strtolower($str[$i][$j]);
            }
        }
    }
    $str = implode(" ", array_reverse($str));
    return $str;
}

function transformSentence($str)
{
    $str = explode(" ", $str);
    for ($i = 0; $i < sizeof($str); $i++) {
        for ($j = 1; $j < strlen($str[$i]); $j++) {
            if (strtolower($str[$i][$j - 1]) < strtolower($str[$i][$j])) {
                $str[$i][$j] = strtoupper($str[$i][$j]);
            } elseif (strtolower($str[$i][$j - 1]) > strtolower($str[$i][$j])) {
                $str[$i][$j] = strtolower($str[$i][$j]);
            }
        }
    }
    $str = implode(" ", $str);
    return $str;
}

function diagonalDifference($arr)
{
    // $firstDiagonal = $arr[0][0] + $arr[1][1] + $arr[2][2];
    // $secondDiagonal = $arr[0][2] + $arr[1][1] + $arr[2][0];
    $firstDiagonal = 0;
    $secondDiagonal = 0;
    $absDiff = abs($firstDiagonal - $secondDiagonal);

    return $absDiff;
}

function insertVal2(&$arr, $val, $index)
{
    $right = [];
    $left = [];
    $middle = [$val];
    for ($i = 0; $i < $index; $i++) {
        $left[] = $arr[$i];
    }
    for ($i = $index; $i < sizeof($arr); $i++) {
        $right[] = $arr[$i];
    }

    $arr = [...$left, ...$middle, ...$right];
    return $arr;
}

function spinWords(string $str): string
{
    $str = explode(" ", $str);
    foreach ($str as &$word) {
        if (strlen($word) >= 5) {
            $word = strrev($word);
        }
    }
    return implode(" ", $str);
}

function DNA_strand($dna)
{
    $dna = str_split($dna);
    foreach ($dna as &$val) {
        switch ($val) {
            case 'T':
                $val = "A";
                break;
            case 'A':
                $val = "T";
                break;
            case 'C':
                $val = "G";
                break;
            case 'G':
                $val = "C";
                break;
            default:
                break;
        }
    }
    return implode($dna);
}

function binaryArrayToNumber($arr)
{
    $arr = array_reverse($arr);
    $res = 0;
    $multiplier = 1;
    for ($i = 0; $i < sizeof($arr); $i++) {
        $res += $arr[$i] * $multiplier;
        $multiplier *= 2;
    }
    return $res;
}

function duplicateCount($str)
{
    return count(array_filter(array_count_values(str_split(strtolower($str))), function ($item) {
        return $item > 1;
    }));
}

function toCamelCase($str)
{
    $str = str_split($str);
    for ($i = 0; $i < sizeof($str); $i++) {
        if ($str[$i] == "_" or $str[$i] == "-") {
            unset($str[$i]);
            $str[$i + 1] = strtoupper($str[$i + 1]);
        }
    }
    return implode($str);
}

function endsWith($str, $ending)
{
    return (substr($str, -strlen($ending)) == $ending or $ending == "") ? "true" : "false";
}

function onlyDuplicates($str)
{
    $count = array_count_values(str_split(strtolower($str)));
    $res = '';
    for ($i = 0; $i < strlen($str); $i++) {
        if ($count[$str[$i]] > 1) {
            $res .= $str[$i];
        }
    }
    return $res;
}

function isIsogram($str)
{
    foreach (array_count_values(str_split(strtolower($str))) as $val) {
        if ($val > 1) {
            return false;
        }
    }
    return true;
}


function odd_or_even(array $a): string
{
    $total = array_reduce($a, function ($prev, $current) {
        $prev += $current;
        return $prev;
    });
    return $total % 2 == 0 ? "even" : "odd";
}
// print_r(odd_or_even([0]));

function digital_root($number)
{
    $res = 0;
    $number = str_split("$number");
    for ($i = 0; $i < count($number); $i++) {
        $res += $number[$i];
    }
    $number = $res;
    if (sizeof(str_split("$res")) > 1) {
        return digital_root($res);
    } else {
        return $number;
    }
}
// print_r(digital_root(1236));

function moveZeros(array $arr): array
{
    $left = array();
    $right = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        if ($arr[$i] === 0 or $arr[$i] === floatval(0.0)) {
            $right[] = 0;
        } else {
            $left[] = $arr[$i];
        }
    }
    return array_merge($left, $right);
}
// echo false . "\n";

// // echo null == 0.0 . "\n";
// echo 0.0000 == 0 . "\n";

// print_r(moveZeros([9, 0.0, null, 0, 9, 1, 2, 0, 1, 0, 1, 0.0, 3, 0, 1, 9, 0, 0, 0, 0, 9]));

function highestrank($arr)
{
    $countValues = array_count_values($arr);
    arsort($countValues);
    $maxValues = array();
    foreach ($countValues as $key => $value) {
        if ($value == max(array_values($countValues))) {
            array_push($maxValues, $key);
        }
    }
    return max($maxValues);
}
// print_r(highestrank([10, 12, 12, 12, 3, 3, 3, 10, 2, 4]));
function removeDuplicateIds($arr)
{
}
$matrix = [
    "1" => ["C", "F", "G"],
    "2" => ["A", "B", "C"],
    "3" => ["A", "B", "D"]
];
// print_r(removeDuplicateIds($matrix));
/* output: 
    "1" => ["F", "G"],
    "2" => ["C"],
    "3" => ["A", "B", "D"] */

function factorial($n)
{
    if ($n - 1 == 0) {
        return $n;
    }
    // $n *= ($n-1);
    return $n * factorial($n - 1);
}

function q1($n)
{
    return (abs($n - 100) <= 10 or abs($n - 200) <= 10) ? true : false;
}

function primeNum($n)
{
    if ($n <= 1) return false;
    if ($n == 2) return true;
    if ($n % 2 == 0) return false;
    $m = sqrt($n);
    for ($i = 3; $i <= $m; $i += 2) {
        if ($n % $i == 0) return false;
    }
    return true;
}

function find_emirp($n)
{
    $n = "$n";
    $items = [];
    for ($i = 2; $i < $n; $i++) {
        if ($i == strrev($i)) {
            continue;
        } elseif ($i != strrev($i) and primeNum($i) and primeNum(strrev($i))) {
            array_push($items, +$i);
        }
    }
    $max = (count($items) > 0) ? max($items) : 0;
    return [count($items), $max, array_sum($items)]; //[amount of emirps in the range(13, n + 1), largest emirp smaller than n, sum of all the emirps of this range.
}

// print_r(find_emirp(10));
// print_r(find_emirp(9999));

function get_dividers($values, $powers)
{
    $total = 1;
    $res = array();
    for ($i = 0; $i < sizeof($values); $i++) {
        $total *= pow($values[$i], $powers[$i]);
    }
    for ($i = 1; $i <= $total; $i++) {
        if ($total % $i == 0) {
            array_push($res, $i);
        }
    }
    return $res;
}
