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

// print_r(moveZeros([9, 0.0, null, 0, 9, 1, 2, 0, 1, 0, 1, 0.0, 3, 0, 1, 9, 0, 0, 0, 0, 9]));

function highestRank($arr)
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
// print_r(highestRank([10, 12, 12, 12, 3, 3, 3, 10, 2, 4]));
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
    return $n * factorial($n - 1);
}
// print_r(factorial(5)); // 5! => 5*4*3*2*1=120
function q1($n)
{
    return (abs($n - 100) <= 10 or abs($n - 200) <= 10) ? true : false;
}

function isPrime($n)
{
    if ($n <= 1) return false;
    if ($n == 2) return true;
    if ($n % 2 == 0) return false;
    for ($i = 3; $i < $n; $i += 2) {
        if ($n % $i == 0) return false;
    }
    return true;
}
// echo isPrime(19);
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

function persistence(int $num)
{
    if (strlen("$num") == 1) {
        return 0;
    }
    $counter = 0;
    $res = 1;
    while (true) {
        $num = str_split("$num");
        for ($i = 0; $i < sizeof($num); $i++) {
            $res *= $num[$i];
        }
        if (strlen("$res") > 1) {
            $counter++;
            $num = $res;
            $res = 1;
        } else if (strlen("$res") == 1) {
            $counter++;
            return $counter;
        }
    }
}
// print_r(persistence(999));
// echo "\n";
function rgb($r, $g, $b)
{
    $deciColor = array($r, $g, $b);
    $hexa = '';
    $hexCode = array(
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => 'A',
        '11' => 'B',
        '12' => 'C',
        '13' => 'D',
        '14' => 'E',
        '15' => 'F',
    );
    foreach ($deciColor as $val) {
        if ($val >= 255) {
            $hexa .= "FF";
        } elseif (0 >= $val) {
            $hexa .= "00";
        } else if ($val <= 15) {
            $hexa .= "0{$hexCode[$val]}";
        } else {
            $temp = '';
            while (true) {
                if (($val / 16) > 0) {
                    echo $val . ": first\n";
                    $temp .= $hexCode[$val % 16];
                    $val = intval($val / 16);
                    echo $val . ": second\n";
                } else {
                    break;
                }
            }
            $hexa .= strrev($temp);
        }
    }
    return $hexa;
    // other solution:
    // return dechex($r) . dechex($g) . dechex($b);
}
// echo rgb(1, 2, 1) . "\n";
// echo rgb(-500, 0, 0);
function sum_strings($a, $b)
{
    [$a, $b] = [strrev($a), strrev($b)];
    $res = "";
    $len = max(strlen($a), strlen($b)) + 1;
    $remainder = 0;
    // for ($i = 0; $i <= $len; $i++)
    // $i = 0;
    // while (true)
    for ($i = 0; $i < $len; $i++) {
        echo "S///////////////////////////////////////////////////////////////////\n";
        $na = isset($a[$i]) ? $a[$i] : 0;
        $nb = isset($b[$i]) ? $b[$i] : 0;
        echo "values:" . $na + $nb . " remainder:" . $remainder .  "\n";
        if (empty($na) and empty($nb) and !empty($remainder)) {
            $res = str_split($res);
            $res[0] += 1;
            $res = implode($res);
            $remainder--;
            echo "TopRes:" .
                $res . " remainder:" . $remainder .  "\n\n";
            // $i++;
            continue;
        } else {
            if ($na + $nb >= 10) {
                if ($remainder == 0) {
                    $remainder++;
                    $res .= ($na + $nb + $remainder - 10);
                } else {
                    $res .= ($na + $nb + $remainder - 10);
                }
                echo "res(na+nb>=10):" .
                    $res . " remainder:" . $remainder .  "\n";
            } elseif (!empty($remainder) and ($na + $nb + 1) >= 10) {
                $res .= ($na + $nb + 1 - 10);
                $remainder--;
                echo "res(empty(rem)&na+nb+1=10):" .
                    $res . " remainder:" . $remainder .  "\n";
            } else {
                $res .= abs($na + $nb + 1);
                $remainder--;
                echo "res(else):" .
                    $res . " remainder:" . $remainder .  "\n";
            }
            // $i++;
        }
        echo "E///////////////////////////////////////////////////////////////////\n\n";
    }
    return strrev($res);
}
// $x = sprintf('%0.0f', pow(2, 5000));
// print_r(sum_strings("19", "1"));
function sum_string($a, $b)
{
    [$a, $b] = [strrev($a), strrev($b)];
    $res = "";
    $len = max(strlen($a), strlen($b)) + 1;
    $remainder = 0;
    for ($i = 0; $i < $len; $i++) {
        echo "S///////////////////////////////////////////////////////////////////\n";
        $na = isset($a[$i]) ? $a[$i] : 0;
        $nb = isset($b[$i]) ? $b[$i] : 0;
        echo "values: " . $na + $nb . " remainder: " . $remainder .  "\n";
        if (($na + $nb) < 10 and empty($remainder)) {
            $res .= $na + $nb + $remainder;
            $remainder = 0;
            echo "values: " . $na + $nb . "res(na+nb<10&empty): $res  remainder: $remainder" .  "\n";
        } elseif (($na + $nb) >= 10 and empty($remainder)) {
            $res .= ($na + $nb) - 10;
            $remainder = 1;
            echo "values:" . $na + $nb . "res(a+b>=10&empty): $res remainder: $remainder" .  "\n";
        } elseif (($na + $nb) < 8 and !empty($remainder)) {
            $res .= ($na + $nb + $remainder);
            $remainder = 0;
            echo "values: " . $na + $nb . "res(na+nb<10&!empty): $res  remainder: $remainder" .  "\n";
        } elseif (($na + $nb + $remainder) >= 10 and !empty($remainder)) {
            $res .= ($na + $nb + $remainder) - 10;
            $remainder = 1;
            echo "values:" . $na + $nb . "res(a+b+r>=10&!empty): $res remainder: $remainder" .  "\n";
        }
        echo "E///////////////////////////////////////////////////////////////////\n\n";
    }
    // return strrev($res);
    return ltrim(strrev($res), "0");
}
// echo "\n\n";
// echo sum_string(
//     "712569312664357328695151392",
//          "8100824045303269669937"
// ) == "712577413488402631964821329" ? "true" : sum_string(
//     "712569312664357328695151392",
//     "8100824045303269669937"
// );
// echo "\n\n";
// echo sum_string("712569312664357328695151392",
//                      "8100824045303269669937") == "712577413488402631964821329" ? "true" : "false";
// echo "\n\n";
// var_dump(5>3 xor 5>6); // false xor false => false, true xor false => true, true and true => false;
// echo sum_string("999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999", '1');
// print_r(sum_strings("899", "31"));
// echo !empty(5);
// $y = "h12lo";
// $z = $y[1] + $y[2];
// print_r($z);
// echo sprintf('%0.0f', PHP_FLOAT_MAX);
// // echo "\n\n\n";
// echo gettype($x);
// echo str_replace(['a', 'e', 'i', 'o', 'u'], "", "this is awesome");

function likes($names)
{
    switch (count($names)) {
        case 0:
            return 'no one likes this';
        case 1:
            return array_values($names)[0] . ' likes this';
        case 2:
            return array_values($names)[0] . " and " . array_values($names)[1] . ' like this';
        case 3:
            return array_values($names)[0] . ", " . array_values($names)[1] . " and " . array_values($names)[2] . ' like this';
        default:
            $res = array_values($names)[0] . ", " . array_values($names)[1] . " and " . count(array_slice($names, 2))
                . ' others like this';
            return $res;
    }
}

// print_r(likes(['Alex', 'Jacob', 'Mark', 'Max']));
// function XO($s)
// {
//     $xos = ["0", "o", "x"];
//     $s = str_split(strtolower($s));
//     foreach (array_count_values($s) as $value => $count) {
//         if () {

//         }
//     }
// }
// print_r(XO('xoxXOoOXooXX'));

function countBits($n)
{
    return array_count_values(str_split(strval(decbin($n))))[1];
}
// echo "This is\nan\nexample\nrow";
// echo countBits(7);

function findShort($str)
{
    $minWord = strlen($str);
    $str = explode(" ", $str);
    foreach ($str as $word) {
        if (min($minWord, strlen($word)) != $minWord) $minWord = strlen($word);
    }
    return $minWord;
}
// print_r(findShort("turns out random test cases are easier than writing out basic ones"));

function duplicate_encode($word)
{
    $word = str_split(strtolower($word));
    $charCount = array_count_values(($word));
    $res = "";
    foreach ($word as $char) {
        ($charCount[$char] <= 1) ? $res .= "(" : $res .= ")";
    }
    return $res;
}
// var_dump(duplicate_encode('din'));
// var_dump(duplicate_encode('recede'));

function format_duration($seconds)
{
    if ($seconds == 0) return "now";
    #################################
    $oneMinute = 60;
    $oneHour = 3600;
    $oneDay = 86400;
    $oneYear = 31536000;
    #################################
    $yearsCount = 0;
    $daysCount = 0;
    $hoursCount = 0;
    $minutesCount = 0;
    #################################

    while (true) {
        if ($seconds >= $oneYear) {
            $yearsCount++;
            $seconds -= $oneYear;
        } elseif ($seconds - $oneDay >= 0) {
            $daysCount++;
            $seconds -= $oneDay;
        } elseif ($seconds - $oneHour >= 0) {
            $hoursCount++;
            $seconds -= $oneHour;
        } elseif ($seconds - $oneMinute >= 0) {
            $minutesCount++;
            $seconds -= $oneMinute;
        } elseif ($seconds < $oneMinute) {
            break;
        }
    }
    #################################
    switch ($yearsCount) {
        case 1:
            $yearsCount = "$yearsCount year";
            break;
        case 0:
            $yearsCount = "";
            break;
        default:
            $yearsCount = "$yearsCount years";
            break;
    }
    #################################
    switch ($daysCount) {
        case 1:
            $daysCount = "$daysCount day";
            break;
        case 0:
            $daysCount = "";
            break;
        default:
            $daysCount = "$daysCount days";
            break;
    }
    #################################
    switch ($hoursCount) {
        case 1:
            $hoursCount = "$hoursCount hour";
            break;
        case 0:
            $hoursCount = "";
            break;
        default:
            $hoursCount = "$hoursCount hours";
            break;
    }
    #################################
    switch ($minutesCount) {
        case 1:
            $minutesCount = "$minutesCount minute";
            break;
        case 0:
            $minutesCount = "";
            break;
        default:
            $minutesCount = "$minutesCount minutes";
            break;
    }
    #################################
    switch ($seconds) {
        case 1:
            $seconds = "$seconds second";
            break;
        case 0:
            $seconds = "";
            break;
        default:
            $seconds = "$seconds seconds";
            break;
    }
    $finalCount = [
        "years" => $yearsCount,
        "days" => $daysCount,
        "hours" => $hoursCount,
        "minutes" => $minutesCount,
        "seconds" => $seconds
    ];

    $res = array_reverse(array_values(array_filter(array_values($finalCount), function ($item) {
        return $item != "";
    })));
    $finalRes = "";
    for ($i = sizeof($res) - 1; $i >= 0; $i--) {
        if ($i == 0) {
            $finalRes .= "$res[$i]";
        } elseif ($i == 1) {
            $finalRes .= "$res[$i] and ";
        } else {
            $finalRes .= "$res[$i], ";
        }
    }
    return $finalRes;
}

// print_r(format_duration(31626060));
// format_duration(121);
// echo 060;

function mix($s1, $s2)
{
    $s1 = str_split(preg_replace('/[A-Z]/', '', str_replace([" ", ",", ".", "?"], "", $s1)));
    $s2 = str_split(preg_replace('/[A-Z]/', '', str_replace([" ", ",", ".", "?"], "", $s2)));
    $s1Count = array_count_values($s1);
    $s2Count = array_count_values($s2);
    return [$s1Count, $s2Count];
}

// print_r(mix("Are they here", "yes, they are here")); 
// 2:eeeee/2:yy/=:hh/=:rr

function Mumbling($s)
{
    return implode("-", array_map(function ($index, $value) {
        return ucfirst(str_repeat($value, ($index + 1)));
    }, array_keys(str_split(strtolower($s))), str_split(strtolower($s))));
}

function find($integers)
{
    $odds = [];
    $evens = [];
    foreach ($integers as $value) {
        $value % 2 == 0 ? array_push($evens, $value) : array_push($odds, $value);
    }
    return sizeof($odds) == 1 ? $odds[0] : $evens[0];
}

// echo find([101, 101, 102]);

function human_readable($seconds)
{
    $oneHour = 3600;
    $oneMinute = 60;
    $hoursCount = (floor($seconds / $oneHour));
    $minutesCount = (floor($seconds / $oneMinute) % 60);
    $seconds = floor($seconds) % 60;
    return ($hoursCount < 10 ? "0$hoursCount:" : "$hoursCount:") . ($minutesCount < 10 ? "0$minutesCount:" : "$minutesCount:") . ($seconds < 10 ? "0$seconds" : "$seconds");
}

// print_r(human_readable(359999));


function generateHashtag($str)
{
    if (empty($str)) return false;
    $res = "";
    foreach (explode(" ", trim($str)) as $word) {
        if (!empty($word)) $res .= ucfirst($word);
    }
    if (empty($res)) return false;
    return strlen("#$res") > 140 ? false : "#$res";
}
// print_r(generateHashtag("    hello     world   "));
// print_r(generateHashtag(str_repeat("a", 139)));
// echo strlen("#Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
function orderWeight($str)
{
    $nums = explode(" ", $str);
    sort($nums);
    $weights = [];
    foreach ($nums as $value) {
        // print_r(array_sum(str_split("$value")));
        // echo "\n";
        array_push($weights, array_sum(str_split("$value")));
    }
    $res = array_combine($nums, $weights);
    krsort($res);
    asort($res);
    // print_r($res);
    // echo "\n";
    // rsort($nums);
    // sort($weights);
    // print_r($nums);
    $temp = [];
    foreach (array_keys($res) as $value) {
        while (in_array($value, $nums)) {
            array_push($temp, $value);
            unset($nums[array_search($value, $nums)]);
        }
    }
    // print_r($temp);
    return implode(' ', array_keys($res));
}
// (orderWeight("2000 10003 1234000 44444444 9999 11 11 22 123"));
// print_r(orderWeight("2000 10003 1234000 44444444 9999 11 11 22 123"));
//          sorted: "11 11 22 123 2000 9999 10003 1234000 44444444"
//             out: "11 11 2000 10003 22 123 1234000 44444444 9999"
//               w: "2  2  2     4     4   6    10     32      36"

// print_r(orderWeight("56 65 74 100 99 68 86 180 90"));
//                  "100 180 90 56 65 74 68 86 99"
//                  "56 65 68 74 86 90 99 100 180"
//                  "11 11 14 11 14 09 18 001 009"

$x = [
    "56" => 11,
    "65" => 11,
    "68" => 14,
    "74" => 11,
    "86" => 14,
    "90" => 9,
    "99" => 18,
    "100" => 1,
    "180" => 9,
];
krsort($x);
asort($x);
// print_r(($x));
// $y = [strval(180), strval(90)];
// sort($y);
// sort($z);
// print_r($y);
// print_r($z);
$z = [10, 2, 100, 22, 30];
function lexicographical($arr)
{
    // Convert the numbers to strings
    $stringNumbers = array_map('strval', $arr);
    // Sort the array in lexicographical order
    sort($stringNumbers);
    print_r($stringNumbers);
}
// lexicographical($z);

function alphanumeric(string $s): bool
{
    return ctype_alnum($s);
}

// var_dump(alphanumeric("            "));
function uniqueInOrder($str)
{
    if (!is_array($str)) $str = str_split($str);
    if (sizeof($str) < 1) return [];
    if (sizeof($str) == 1) return $str;
    $ret = [];
    for ($i = 0; $i < sizeof($str); $i++) {
        if (empty($ret)) array_push($ret, $str[$i]);
        if ($str[$i] != $ret[sizeof($ret) - 1]) {
            array_push($ret, $str[$i]);
        }
    }
    return $ret;
}
// var_dump(uniqueInOrder([1, 2, 2, 3]));
function basicOp($op, $val1, $val2)
{

    switch ($op) {
        case '+':
            return $val1 + $val2;
        case '-':
            return $val1 - $val2;
        case '*':
            return $val1 * $val2;
        case '/':
            return $val1 / $val2;
        default:
            return "error";
    }
}
// basicOp('+', 4, 7);

// var_dump(password_hash('123', ));
// var_dump(md5("123"));
// echo "\n";
// var_dump(md5("123"));
// echo "\n";
// var_dump(md5("12345"));
// echo "\n";
// // var_dump(md5("123") == "202cb962ac59075b964b07152d234b70");
//Don't echo anything, will take to much time
function crack($hash)
{
    for ($a = 0; $a < 10; $a++) {
        for ($b = 0; $b < 10; $b++) {
            for ($c = 0; $c < 10; $c++) {
                for ($d = 0; $d < 10; $d++) {
                    for ($e = 0; $e < 10; $e++) {
                        // echo $a . $b . $c . $d . $e . "\n";
                        if (md5($a . $b . $c . $d . $e) == $hash) {
                            return $a . $b . $c . $d . $e;
                        }
                    }
                }
            }
        }
    }
}
// echo ;
// var_dump(crack(md5(strval(99999))));

function is_prime($number)
{
    if ($number == 1) return false;
    if ($number == 2) return true;
    if ($number % 2 == 0) return false;
    $sqrt = sqrt($number);
    for ($i = 3; $i <= $sqrt; $i += 2) {
        if ($number % $i == 0) return false;
    }
    return true;
}

function numPrimorial($n)
{
    $res = 1;
    $i = 0;
    $num = 1;
    while ($i < $n) {
        if (is_prime($num)) {
            $res *= $num;
            $num++;
            $i++;
        }else{
            $num++;
        }
    }
    return $res;
}
var_dump(numPrimorial(3));
// echo is_prime(3);