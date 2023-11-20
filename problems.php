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



$x = [1, 2, 3, 4, 6, 7, 8];
$y = [1, 2, 3, 4, 6, 7, 8];

// insertVal2($x, "value", 4);
// print_r($x);


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



print_r(onlyDuplicates('abccdefee'));
echo "\n";
// print_r() ;
echo "\n";
// print_r() ;
echo "\n";


// print_r(endsWith("samurai", "ai")) ; 
// print_r(toCamelCase("the-stealth_warrior"));
// function DNA_strand2($dna)
// {
//     return strtr($dna, ['A' => 'T', 'T' => 'A', 'C' => 'G', 'G' => 'C']);
// }
// function DNA_strand3($dna)
// {
//     return strtr($dna, 'ACGT', 'TGCA');
// }

// print_r(DNA_strand("AAAA"));
// print_r(DNA_strand("ATTGC"));
// print_r(binaryArrayToNumber([0, 0, 0, 1])); //15
// print_r(duplicateCount("abccde"));
// diagonalDifference([[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12], [13, 14, 15, 16]]);
// print_r(spinWords("Welcome"));
// print_r(spinWords("Hey fellow warriors"));
// print_r(transformSentence("coOL dog")); // output: "cOOl dOg"
// reverse_words_order_and_swap_cases("rUns dOg");
// echo "[" . implode(",", quickSort([1, 5, 8, 0, -1, 5], "asc")) . "] <br>";
// echo "[" . implode(",", quickSort([1, 5, 8, 0, -1, 5], "desc")) . "] <br>";
// echo "[" . implode(",", selectionSort([1, 5, 8, 0, -1, 5], "asc")) . "] <br>";
// echo "[" . implode(",", selectionSort([1, 5, 8, 0, -1, 5], "desc")) . "] <br>";
// print implode(",", selectionSort([1, 5, 8, 0, -1, 5], "des"));
// array_splice($array, index, (0=> add, number=> how many items to remove), $value);
// echo challenge("12m21");
// replaceVar();
// echo "minTime: " . minTime([4, 1, 3, 2, 8], 4, 1) . "\n";
// plusMinus([1, 1, 0, -1, -1]); // 0.400000, 0.400000, 0.200000
// miniMaxSum([1, 3, 5, 7, 9]);
// echo timeConversion("12:00:00AM");
// echo timeConversion("01:00:00PM");
// echo timeConversion("07:05:45PM");
// echo findMedian([1, 3, 50, 7, 0]);
// print (lonelyInteger([1, 1, 2, 2, 3, 4, 4, 5, 5]));
// mostActive([
//     "Bigcorp",
//     "Bigcorp",
//     "Acme",
//     "Bigcorp",
//     "Zork",
//     "Zork",
//     "Abc",
//     "Bigcorp",
//     "Acme",
//     "Bigcorp",
//     "Bigcorp",
//     "Zork",
//     "Bigcorp",
//     "Zork",
//     "Zork",
//     "Bigcorp",
//     "Acme",
//     "Bigcorp",
//     "Acme",
//     "Bigcorp",
//     "Acme",
//     "Littlecorp",
//     "Nadircorp"
// ]);
