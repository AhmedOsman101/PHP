<?php

function selectionSort($arr, $mode = "asc") {
    for ($i = 0; $i < sizeof($arr); $i++) {
        for ($j = ($i + 1); $j < sizeof($arr); $j++) {
            if ($arr[$j] < $arr[$i]) {
                [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
            }
        }
    }
    if (strtolower($mode) == "asc") return $arr;
    if (strtolower($mode) == "desc") {
        $arr = array_reverse($arr);
        return $arr;
    } else return "invalid input";
}

function sortArrayByKey($arr, $mode = "asc") {
    $keys = array_keys($arr);
    $keys = selectionSort($keys, $mode);
    $res = array();
    if ($keys == "invalid input") return $keys;
    foreach ($keys as $key)  $res[$key] = $arr[$key];
    return $res;
}

function sortArrayByValue($arr, $mode = "asc") {
    $values = array_values($arr);
    $values = selectionSort($values, $mode);
    if ($values == "invalid input") return $values;
    $res = array();
    foreach ($values as $value) {
        foreach (array_keys($arr) as $key) {
            if ($arr[$key] == $value) {
                $res[$key] = $value;
                break;
            }
        }
    }
    return $res;
}


// Sample associative array
$arr = array(
    "Sophia" => "31",
    "Jacob" => "41",
    "William" => "39",
    "Ramesh" => "40"
);

// Print the unsorted array
echo "<h1>unsorted list</h1>";
print_r($arr);

// Sort the array by value in ascending order and print the result
echo "<h1>a) ascending order sort by value</h1>";
print_r(sortArrayByValue($arr, "asc"));

// Sort the array by key in ascending order and print the result
echo "<h1>b) ascending order sort by key</h1>";
// print_r(sortArrayByKey($arr, "asc"));
print_r(sortArrayByKey($arr));

// Sort the array by value in descending order and print the result
echo "<h1>c) descending order sort by value</h1>";
print_r(sortArrayByValue($arr, "desc"));

// Sort the array by key in descending order and print the result
echo "<h1>d) descending order sort by key</h1>";
print_r(sortArrayByKey($arr, "desc"));
