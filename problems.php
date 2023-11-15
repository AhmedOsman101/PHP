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

function lonelyinteger($a) {
    $count = array_count_values($a);
    // print_r($count);
    $res = [];
    foreach ($count as $key => $value) {
        // echo "key: {$key} value:{$value}";
        if ($value == 1) {
            // array_push($res, $key);
            return $key;
        }
    }

}

// replaceVar();
// echo "minTime: " . minTime([4, 1, 3, 2, 8], 4, 1) . "\n";
// plusMinus([1, 1, 0, -1, -1]); // 0.400000, 0.400000, 0.200000
// miniMaxSum([1, 3, 5, 7, 9]);
// echo timeConversion("12:00:00AM");
// echo timeConversion("01:00:00PM");
// echo timeConversion("07:05:45PM");
// echo findMedian([1, 3, 50, 7, 0]);
// print (lonelyinteger([1, 1, 2, 2, 3, 3, 4, 5, 5]));

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
