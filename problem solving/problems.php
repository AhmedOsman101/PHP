
<?php
function mostActive($customers) {
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

function minTime(array $files, int $numCores, int $limit) {
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

function plusMinus($arr) {
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

function miniMaxSum($arr) {
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

function timeConversion($s) {
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

function findMedian($arr) {
    sort($arr);
    return $arr[sizeOf($arr) / 2];
    // [1, 2, 3, 4, 5]
}

function replaceVar() {
    $x = 5;
    $y = 8;
    [$x, $y] = [$y, $x];
    echo "x: {$x} y: {$y}";
}

function lonelyInteger($a) {
    $count = array_count_values($a);
    foreach ($count as $key => $value) {
        if ($value == 1) {
            return $key;
        }
    }
    return "none";
}

function challenge($s) {
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

function mini($arr) {
    $min = 0;
    foreach ($arr as $item) {
        if ($item < $min) {
            $min = $item;
        }
    }
    return $min;
}
// echo min([1, 5, 8, 0, -1, 5]);
function maxi($arr) {
    $max = null;
    foreach ($arr as $item) {
        if ($item > $max) {
            $max = $item;
        }
    }
    return $max;
}



function reverse_words_order_and_swap_cases($str) {
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

function transformSentence($str) {
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

function diagonalDifference($arr) {
    // $firstDiagonal = $arr[0][0] + $arr[1][1] + $arr[2][2];
    // $secondDiagonal = $arr[0][2] + $arr[1][1] + $arr[2][0];
    $firstDiagonal = 0;
    $secondDiagonal = 0;
    $absDiff = abs($firstDiagonal - $secondDiagonal);

    return $absDiff;
}

function insertVal2(&$arr, $val, $index) {
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

function spinWords(string $str): string {
    $str = explode(" ", $str);
    foreach ($str as &$word) {
        if (strlen($word) >= 5) {
            $word = strrev($word);
        }
    }
    return implode(" ", $str);
}

function DNA_strand($dna) {
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

function binaryArrayToNumber($arr) {
    $arr = array_reverse($arr);
    $res = 0;
    $multiplier = 1;
    for ($i = 0; $i < sizeof($arr); $i++) {
        $res += $arr[$i] * $multiplier;
        $multiplier *= 2;
    }
    return $res;
}

function duplicateCount($str) {
    return count(array_filter(array_count_values(str_split(strtolower($str))), function ($item) {
        return $item > 1;
    }));
}

function toCamelCase($str) {
    $str = str_split($str);
    for ($i = 0; $i < sizeof($str); $i++) {
        if ($str[$i] == "_" or $str[$i] == "-") {
            unset($str[$i]);
            $str[$i + 1] = strtoupper($str[$i + 1]);
        }
    }
    return implode($str);
}

function endsWith($str, $ending) {
    return (substr($str, -strlen($ending)) == $ending or $ending == "") ? "true" : "false";
}

function onlyDuplicates($str) {
    $count = array_count_values(str_split(strtolower($str)));
    $res = '';
    for ($i = 0; $i < strlen($str); $i++) {
        if ($count[$str[$i]] > 1) {
            $res .= $str[$i];
        }
    }
    return $res;
}

function isIsogram($str) {
    foreach (array_count_values(str_split(strtolower($str))) as $val) {
        if ($val > 1) {
            return false;
        }
    }
    return true;
}


function odd_or_even(array $a): string {
    $total = array_reduce($a, function ($prev, $current) {
        $prev += $current;
        return $prev;
    });
    return $total % 2 == 0 ? "even" : "odd";
}
// print_r(odd_or_even([0]));

function digital_root($number) {
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

function moveZeros(array $arr): array {
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

function highestRank($arr) {
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

function factorial2($n) {
    if ($n - 1 == 0) {
        return $n;
    }
    return $n * factorial($n - 1);
}
// print_r(factorial(5)); // 5! => 5*4*3*2*1=120
function q1($n) {
    return (abs($n - 100) <= 10 or abs($n - 200) <= 10) ? true : false;
}

function isPrime($n) {
    if ($n <= 1) return false;
    if ($n == 2) return true;
    if ($n % 2 == 0) return false;
    for ($i = 3; $i < $n; $i += 2) {
        if ($n % $i == 0) return false;
    }
    return true;
}
// echo isPrime(19);
function find_emirp($n) {
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

function get_dividers($values, $powers) {
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

function persistence(int $num) {
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
function rgb($r, $g, $b) {
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
    // other Split Strings:
    // return dechex($r) . dechex($g) . dechex($b);
}
// echo rgb(1, 2, 1) . "\n";
// echo rgb(-500, 0, 0);


function likes($names) {
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



function countBits($n) {
    return array_count_values(str_split(strval(decbin($n))))[1];
}
// echo "This is\nan\nexample\nrow";
// echo countBits(7);

function findShort($str) {
    $minWord = strlen($str);
    $str = explode(" ", $str);
    foreach ($str as $word) {
        if (min($minWord, strlen($word)) != $minWord) $minWord = strlen($word);
    }
    return $minWord;
}
// print_r(findShort("turns out random test cases are easier than writing out basic ones"));

function duplicate_encode($word) {
    $word = str_split(strtolower($word));
    $charCount = array_count_values(($word));
    $res = "";
    foreach ($word as $char) {
        ($charCount[$char] <= 1) ? $res .= "(" : $res .= ")";
    }
    return $res;
}
// var_export(duplicate_encode('din'));
// var_export(duplicate_encode('recede'));

function format_duration($seconds) {
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



function Mumbling($s) {
    return implode("-", array_map(function ($index, $value) {
        return ucfirst(str_repeat($value, ($index + 1)));
    }, array_keys(str_split(strtolower($s))), str_split(strtolower($s))));
}

function find($integers) {
    $odds = [];
    $evens = [];
    foreach ($integers as $value) {
        $value % 2 == 0 ? array_push($evens, $value) : array_push($odds, $value);
    }
    return sizeof($odds) == 1 ? $odds[0] : $evens[0];
}

// echo find([101, 101, 102]);

function human_readable($seconds) {
    $oneHour = 3600;
    $oneMinute = 60;
    $hoursCount = (floor($seconds / $oneHour));
    $minutesCount = (floor($seconds / $oneMinute) % 60);
    $seconds = floor($seconds) % 60;
    return ($hoursCount < 10 ? "0$hoursCount:" : "$hoursCount:") . ($minutesCount < 10 ? "0$minutesCount:" : "$minutesCount:") . ($seconds < 10 ? "0$seconds" : "$seconds");
}

// print_r(human_readable(359999));


function generateHashtag($str) {
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


function alphanumeric(string $s): bool {
    return ctype_alnum($s);
}
// var_export(alphanumeric("            "));

function uniqueInOrder($str) {
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
// var_export(uniqueInOrder([1, 2, 2, 3]));
function basicOp($op, $val1, $val2) {
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

// var_export(password_hash('123', ));
// var_export(md5("123"));
// echo "\n";
// var_export(md5("123"));
// echo "\n";
// var_export(md5("12345"));
// echo "\n";
// // var_export(md5("123") == "202cb962ac59075b964b07152d234b70");
//Don't echo anything, will take to much time
function crack($hash) {
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
// var_export(crack(md5(strval(99999))));


function numPrimorial($n) {
    $res = 1;
    $i = 0;
    $num = 1;
    while ($i < $n) {
        if (isprime($num)) {
            $res *= $num;
            $num++;
            $i++;
        } else {
            $num++;
        }
    }
    return $res;
}
// var_export(numPrimorial(3));
// echo isprime(3);
//// Start the timer
// $start_time = microtime(true);

// // Call your function
// $result = crack(md5(strval(99999)));

// // Stop the timer
// $end_time = microtime(true);

// // Calculate the difference in microseconds
// $execution_time = $end_time - $start_time;

// echo "The function took " . $execution_time . " seconds to execute.";
function longest($a, $b) {
    $res = (array_keys(array_count_values(str_split($a . $b))));
    sort($res);
    return implode($res);
}
// echo longest("aretheyhere", "yestheyarehere"); // aehrsty;
function detect_pangram($string) {
    $string = str_split(strtoupper($string));
    $alphabet = range("A", "Z");
    foreach ($alphabet as $char) {
        if (!in_array($char, $string)) {
            return false;
        }
    }
    return true;
}

// var_export(detect_pangram("The quick brown fox jumps over the lazy dog"));

function narcissistic(int $value): bool {
    $value = str_split("$value");
    $size = sizeof($value);
    $sum = 0;
    foreach ($value as $num) {
        $sum += pow($num, $size);
    }
    return $sum == (implode($value));
}
// var_export(narcissistic(153));
// var_export(range(1, 5));
function tribonacci($signature, $n) {
    $res = [];
    if ($n == 0) return $res;
    $i = 0;
    while (true) {
        if (sizeof($res) == $n) break;
        if ($i <= 2) {
            array_push($res, $signature[$i]);
        } else if ($i == 3) {
            array_push($res, array_sum($res));
        } else {
            array_push($res, array_sum([$res[$i - 3], $res[$i - 2], $res[$i - 1]]));
        }
        $i++;
    }
    return $res;
}

// print_r(tribonacci([1, 1, 1], 1000));
function Xbonacci($s, $n) {
    if ($n == 0) return [];
    $size = sizeof($s);
    $res = [];
    for ($i = 0; $i < $n; $i++) {
        echo "$i>";
        if ($i < $size) {
            array_push($res, $s[$i]);
        } elseif ($i >= $size) {
            array_push($res, array_sum(array_slice($res, $i - $size, $i)));
        }
    }
    // echo "\n";
    return $res;
}

// print_r(Xbonacci([1, 1], 10));
// print_r(Xbonacci([0, 0, 0, 0, 0, 0, 0, 0, 0, 0], 20));
// print_r(Xbonacci([1,2,3,4,5,6,7,8,9,0],15));
function SplitStrings($str) {
    if (empty($str)) return array();
    $str = array_values(str_split($str, 2));
    foreach ($str as &$char) {
        $char = str_pad($char, 2, "_", STR_PAD_RIGHT);
    }
    return $str;
}

function dirReduce(&$arr) {
    if (count($arr) == 0) return [];
    $opposites = [
        "NORTH" => "SOUTH",
        "SOUTH" => "NORTH",
        "EAST" => "WEST",
        "WEST" => "EAST",
    ];
    for ($i = 0; $i < sizeof($arr); $i++) {
        if ($i + 1 < sizeof($arr)) {
            $j = $i + 1;
            if ($arr[$i] == $opposites[$arr[$j]]) {
                unset($arr[$i], $arr[$j]);
                $arr = array_values($arr);
                return dirReduce($arr);
            }
        } else {
            return $arr;
        }
    }
}
$directions = ["NORTH", "SOUTH", "SOUTH", "EAST", "WEST", "NORTH", "WEST"];
// print_r(dirReduce($directions)); // , ["WEST"]
// $array = array('apple', 'orange', 'strawberry', 'blueberry', 'kiwi');
// $array_without_strawberries = array_diff($array, array('strawberry'));
// print_r($array_without_strawberries);
// echo "<pre>";
// print_r();
// echo "</pre>";
function mix($s1, $s2) {
    $res = "";
    $s1 = str_split(preg_replace("/[^a-z]/", "", $s1));
    $s2 = str_split(preg_replace("/[^a-z]/", "", $s2));
    $s1Count = array_count_values($s1);
    $s2Count = array_count_values($s2);
    ksort($s1Count);
    arsort($s1Count);
    ksort($s2Count);
    arsort($s2Count);
    $letters = array_unique([...array_keys($s1Count), ...array_keys($s2Count)]);
    sort($letters);
    foreach ($s1Count as $char => $reps) {
        if (in_array($char, $s2Count)) {
        }
    }
    return $letters;
}

// print_r(mix("Are the kids at home? aaaaa fffff", "Yes they are here! aaaaa fffff"));
// 2:eeeee/2:yy/=:hh/=:rr
function orderWeight($str) {
    $nums = explode(" ", $str);
    sort($nums);
    $weights = []; // all weights
    foreach ($nums as $value) {
        // calc weight and add its value to a new dict
        $weights["$value"] = array_sum(str_split("$value"));
    }

    asort($weights);
    $temp = [];

    foreach (array_keys($weights) as $value) {
        while (in_array($value, $nums)) {
            array_push($temp, $value);
            unset($nums[array_search($value, $nums)]);
        }
    }

    for ($i = 0; $i < sizeof($temp); $i++) {
        for ($j = ($i + 1); $j < sizeof($temp); $j++) {
            $first = &$temp[$i];
            $second = &$temp[$j];
            if ($weights[$first] == $weights[$second]) {
                if (strcmp(strval($second), strval($first)) < 0) {
                    [$first, $second] = [$second, $first];
                }
            }
        }
    }
    return implode(' ', ($temp));
}
// print_r(orderWeight("2000 10003 1234000 44444444 9999 11 11 22 123"));
//          sorted: "11 11 22 123 2000 9999 10003 1234000 44444444"
//             out: "11 11 2000 10003 22 123 1234000 44444444 9999"
//               w: "2  2  2     4     4   6    10     32      36"

function lexicographical($arr) {
    // Convert the numbers to strings
    $stringNumbers = array_map('strval', $arr);
    // Sort the array in lexicographical order
    sort($stringNumbers);
    print_r($stringNumbers);
}
// lexicographical($z);


function sum_strings($a, $b) {
    [$a, $b] = [strrev($a), strrev($b)];
    $res = "";
    $len = max(strlen($a), strlen($b)) + 1;
    $remainder = 0;
    for ($i = 0; $i < $len; $i++) {
        echo "S///////////////////////////////////////////////////////////////////\n";
        $na = isset($a[$i]) ? (int)$a[$i] : 0;
        $nb = isset($b[$i]) ? (int)$b[$i] : 0;
        echo "values:" . $na + $nb . " remainder:" . $remainder .  "\n";
        if (($na + $nb + $remainder) < 10 and !empty($remainder)) {
            $res .= ($na + $nb + $remainder);
            $remainder = 0;
        } elseif (($na + $nb + $remainder) >= 10 and !empty($remainder)) {
            $res .= ($na + $nb + $remainder - 10);
            $remainder = 1;
        } elseif (($na + $nb) < 10 and empty($remainder)) {
            $res .= $na + $nb + $remainder;
            $remainder = 0;
        } elseif (($na + $nb) >= 10 and empty($remainder)) {
            $res .= ($na + $nb) - 10;
            $remainder = 1;
        }
        echo "E///////////////////////////////////////////////////////////////////\n\n";
    }
    return ltrim(strrev($res), "0");
}

// $a = "712569312664357328695151392";
// $b = "8100824045303269669937";
// echo sum_strings($a, $b) . "\n";
// echo ($a + $b) . "\n";


// var_export(5>3 xor 5>6); // false xor false => false, true xor false => true, true and true => false;


function XO($s) {
    $xos = ["o", "x"];
    $res = array_filter(str_split(strtolower($s)), fn ($value) => in_array($value, $xos));
    if (empty($res)) return true;
    if (count(array_unique($res)) == 1) return false;
    if (array_values(array_count_values($res))[0] == array_values(array_count_values($res))[1]) return true;
    return false;
    // function XO($s) {
    //     $lower = strtolower($s);
    //     return substr_count($lower, 'x') === substr_count($lower, 'o');
    // }
}
// print_r(XO('00xoxX0OXooXX'));

function factorial($n) {
    if ($n <= 1) return 1;
    $f = 1;
    for ($i = $n; $i >= 2; --$i) {
        $f *= $i;
    }
    return $f;
}

// factorial(5);

function calc_time() {
    // Start the timer
    $start_time = microtime(true);

    // Call your function
    $result = (isPrime(69));

    // Stop the timer
    $end_time = microtime(true);

    // Calculate the difference in microseconds
    $execution_time = $end_time - $start_time;

    echo "The function took " . $execution_time . " seconds to execute.";
}
// sprintf('%.0', $execution_time)
// calc_time();

function removeNb($n) {
    // echo $n . "\n";
    $range = range(1, $n);
    $total = array_sum($range);
    $res = array();
    foreach ($range as $first) {
        $second = ($total % $first) + $first;
        if (($total - ($first + $second)) == ($first * $second)) {
            array_push($res, [$first, $second], [$second, $first]);
        }
    }
    sort($res);
    return $res;
}

// print_r(removeNb(101)); // 5151 => [[55, 91], [91, 55]]
// print_r(removeNb(1000003)); // 351 => [[15, 21], [21, 15]]
// echo (5151-91)%91;
// echo (351-21-15)%21*15;
// echo (5151%55)+55;


// productFib(4895) // [55, 89, true]
function sumOfDivided($arr) {
    $primes = [];
    foreach (range(1, max(array_map('abs', $arr))) as $value) {
        if (isPrime($value)) {
            $primes[$value] = 0;
        }
    }
    foreach (array_keys($primes) as &$second) {
        $divisible = false;
        foreach ($arr as $first) {
            if ($first % $second == 0) {
                $divisible = true;
                $primes[$second] += $first;
            }
        }
        if (!$divisible) {
            unset($primes[$second]);
        }
    }
    $final = [];
    foreach ($primes as $key => $value) {
        array_push($final, [$key, $value]);
    }
    return ($final);
}
// print_r(sumOfDivided([12, 15]));
// $x = array(35, 18, 25, 35, -45, 27, -22, 31, 49, 42, 33, 37, 18, 50, 48, 29, 45, 15, -56, 39, -79, 23, 46);


// print_r(sumOfDivided($x));
// sumOfDivided([15, 21, 24, 30, -45]) => [[2, 54], [3, 45], [5, 0], [7, 21]];
// $arr["2"] = 5;
// array_splice($arr, 1, 0);
function fibonacci_memo($n, &$memo = []) {
    if (in_array($n, array_keys($memo))) return $memo[$n]; 
    if ($n <= 2) return 1; 
    $memo[$n] = fibonacci_memo($n - 1, $memo) + fibonacci_memo($n - 2, $memo); 
    return $memo[$n];
}

print_r(fibonacci_memo(10));


function canSum_memo($target, $nums, &$memo = []) {
    if (in_array($target, $nums) or $target == 0) return true;
    if (in_array($target, array_keys($memo))) return $memo[$target];
    if ($target < 0) return false;
    foreach ($nums as $val) {
        $nextTarget = $target - $val;
        if (canSum_memo($nextTarget, $nums, $memo)) {
            $memo[$target] = true;
            return $memo[$target];
        }
    }
    $memo[$target] = false;
    return $memo[$target];
}

// var_export(canSum_memo(7, [5, 4, 3, 7]));
// var_export(canSum_memo(31, [7, 9]));
// var_export(canSum_memo(300, [7, 14]));
// var_export(canSum_memo(3000, [7, 14]));

function howSum_memo($target, $nums, &$memo = []) {
    if ($target == 0) return [];
    if ($target < 0) return null;
    if (in_array($target, array_keys($memo))) return $memo[$target];
    if (in_array($target, $nums)) return [$target];
    foreach ($nums as $val) {
        $nextTarget = $target - $val;
        $res = howSum_memo($nextTarget, $nums, $memo);
        if ($res) {
            $memo[$target] = [...$res, $val];
            return $memo[$target];
        }
    }
    $memo[$target] = null;
    return $memo[$target];
}
// var_export(howSum_memo(7, [2, 3])); // [3, 2, 2]
// echo "\n";
// var_export(howSum_memo(7, [5, 3, 4, 7])); // [7]
// echo "\n";
// var_export(howSum_memo(7, [5, 3])); // null
// echo "\n";
// var_export(howSum_memo(8, [2, 3, 5])); // [2, 2, 2, 2]
// echo "\n";
// var_export(howSum_memo(300000, [7, 14])); // null
// echo "\n";
// var_export(howSum_memo(3000000, [7, 14]));

function fibs_fizz_buzz($n) {
    $res = [];
    foreach (range(1, $n) as $numbers) {
        if (fibonacci_memo($numbers) % 3 == 0 and fibonacci_memo($numbers) % 5 == 0) array_push($res, 'FizzBuzz');
        elseif (fibonacci_memo($numbers) % 3 == 0) array_push($res, 'Fizz');
        elseif (fibonacci_memo($numbers) % 5 == 0) array_push($res, 'Buzz');
        else {
            array_push($res, fibonacci_memo($numbers));
            print(fibonacci_memo($numbers) . "\n");
        }
    }
    return $res;
}
// print_r(fibs_fizz_buzz(20));

function fibonacci_tab1($n) {
    $table = array_fill(0, $n + 1, 0);
    $table[1] = 1;
    for ($i = 0; $i <= $n; $i++) {
        @$table[$i + 1] += $table[$i];
        @$table[$i + 2] += $table[$i];
    }
    return $table[$n];
}
function fibonacci_tab2($n) {
    $table = array_fill(0, $n + 1, 0);
    $table[1] = 1;
    for ($i = 0; $i <= $n; $i++) {
        if ($i + 1 <= $n) $table[$i + 1] += $table[$i];
        if ($i + 2 <= $n) $table[$i + 2] += $table[$i];
    }
    return $table[$n];
}

// var_export(fibonacci_tab1(500));
// echo "\n";
// var_export(fibonacci_tab2(500));

function gridTraveler_memo($m, $n, &$memo = []) {
    $key = "$m, $n";
    if ($m == 0 or $n == 0) return 0;
    if ($m == 1 and $n == 1) return 1;
    if (in_array($key, array_keys($memo))) return $memo[$key];
    $memo[$key] = gridTraveler_memo($m - 1, $n, $memo) + gridTraveler_memo($m, $n - 1, $memo);
    return $memo[$key];
}

// var_export(gridTraveler_memo(18, 18));
// var_export(gridTraveler_memo(1, 1));

function twoSum($nums, $target) {
    for ($i = 0; $i < sizeof($nums); $i++) {
        if (in_array($target - $nums[$i], $nums) and $target - $nums[$i] != $nums[$i]) return [$i, array_search($target - $nums[$i], $nums)];
    }
}

function removeDuplicates(&$nums) {
    return array_merge(array_unique($nums), array_fill(0, sizeof($nums) - sizeof(array_unique($nums)), "_"));
}

$nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
// var_export(array_reverse($nums));
// var_export(removeDuplicates($nums) == [0, 1, 2, 3, 4, "_", "_", "_", "_", "_"]);

// echo "Char | ASCII Code\n";
// echo "-----|-----------\n";
// for ($i = 32; $i <= 127; $i++) {
//     echo chr($i) . "    | " . $i . "\n";
// }

function alphabet_position(string $s): string {
    $s = str_split(strtolower(preg_replace('/[^a-zA-Z]/', "", $s)));
    if (empty(implode($s))) return '';
    $s = array_map(fn ($char) => ord($char) - 96, $s);
    return implode(" ", $s);
}
$s = 'h8j9psWLdCOYt^?3*q-g2.po?UYp Lr2$ 8b5*?fT$?wHk8)8?koayXrLq%Hr&BCGIhUy9L!SnVZgJJ@UDR.iD#ffLw)wq?n?hlgYFEX@y0v,Iij8NBW9$UdKbpRizZ9^(8cGVRc&XPOvTmAWcLLt2LVHf5xs.c2lMXohAPQ%6uO$zu-WB,AnDl@fa%z@';
// var_export(alphabet_position($s));
function smallEnough($a, $limit) {
    foreach ($a as $n) {
        if ($limit < $n) return false;
    }
    return true;
    // return max($a) <= $limit;
}
// var_export(smallEnough([66, 101], 200));

function sequence_sum(int $begin, int $end, int $step): int {
    if ($step >= $end or $step >= $begin) return 0;
    return $end < $begin ? 0 : array_sum(range($begin, $end, $step));
}
// var_export(sequence_sum(17, 32, 18));

function snail($arr) {
    if (empty($arr)) return [[]];
    $res = [];
    while (0 < sizeof($arr)) {
        $res = array_merge($res, array_shift($arr));
        foreach ($arr as &$row) array_push($res, array_pop($row));
        if (!empty($arr)) $res = array_merge($res, array_reverse(array_pop($arr)));
        for ($i = sizeof($arr) - 1; $i > -1; $i--) array_push($res, array_shift($arr[$i]));
    }
    return $res;
}

/*
var_export(snail([
    [1, 2, 3, 4, 5],
    [6, 7, 8, 9, 10],
    [11, 12, 13, 14, 15],
    [16, 17, 18, 19, 20],
    [21, 22, 23, 24, 25]
]));
var_export(snail([
    [1, 2, 3, 1],
    [4, 5, 6, 4],
    [7, 8, 9, 7],
    [7, 8, 9, 7]
]));
*/

// function F(int $n, &$memo = [], &$memoM = []): int {
//     if ($n <= 1) return 1;
//     if (isset($memo[$n])) return $memo[$n];
//     $memo[$n] = $n - M(F($n - 1), $memo);
//     return $memo[$n];
// }

// function F(int $n, &$memo = []): int {
//     if ($n <= 1) return 1;
//     if (isset($memo[$n])) return $memo[$n];
//     for ($i = $n - 1; $i >= 1; $i--) {
//         $memo[$n] = $n - M($memo[$i], $memo);
//     }
//     return $memo[$n];
// }
// function M(int $n, &$memoM = []): int {
//     if ($n <= 1) return 0;
//     if (isset($memoM[$n])) return $memoM[$n];
//     $memoM[$n] = $n - F(M($n - 1), $memoM);
//     return $memoM[$n];
// }

// var_export(M(1000));
echo "\n";
// var_export(F(700));



//  

function permutations($s) {
    $res = [];
    if (count($s) == 3) {
        // array_push($res);
    }
    $sorted = false;
    while (!$sorted) {
    }


    sort($res);
    return $res;
}

// print_r(permutations(["cab", "abc", "cba"]));