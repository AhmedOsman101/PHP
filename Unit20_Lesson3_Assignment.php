<?php

/**
 * Function to sort an array using selection sort algorithm.
 *
 * @param array $arr The array to be sorted
 * @param string $mode The sorting mode, either "asc" for ascending or "desc" for descending
 * @return array The sorted array
 */
function selectionSort($arr, $mode) {
    // Check the sorting mode
    if ($mode == "desc") {
        // Sort the array in descending order
        for ($i = 0; $i < sizeof($arr); $i++) {
            for ($j = ($i + 1); $j < sizeof($arr); $j++) {
                if ($arr[$j] > $arr[$i]) {
                    // Swap elements if the current element is greater than the next element
                    [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
                    break;
                }
            }
        }
    } elseif ($mode == "asc") {
        // Sort the array in ascending order
        for ($i = 0; $i < sizeof($arr); $i++) {
            for ($j = ($i + 1); $j < sizeof($arr); $j++) {
                if ($arr[$j] < $arr[$i]) {
                    // Swap elements if the current element is smaller than the next element
                    [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
                    break;
                }
            }
        }
    } else {
        // Return "invalid input" if the sorting mode is neither "asc" nor "desc"
        return "invalid input";
    }

    return $arr;
}

/**
 * Function to sort an associative array by key using selection sort algorithm.
 *
 * @param array $arr The associative array to be sorted
 * @param string $mode The sorting mode, either "asc" for ascending or "desc" for descending
 * @return array The sorted array
 */ 
function sortArrayByKey($arr, $mode) {
    // Get the sorted keys using selectionSort function
    $keys = selectionSort(array_keys($arr), $mode);
    $res = array();

    // Check if the sorting mode is invalid
    if ($keys == "invalid input") {
        return $keys;
    }

    // Reconstruct the sorted array using the sorted keys
    foreach ($keys as $key) {
        $res[$key] = $arr[$key];
    }

    return $res;
}

/**
 * Function to sort an associative array by value using selection sort algorithm.
 *
 * @param array $arr The associative array to be sorted
 * @param string $mode The sorting mode, either "asc" for ascending or "desc" for descending
 * @return array The sorted array
 */ 
function sortArrayByValue($arr, $mode) {
    $keys = array_keys($arr);
    // Get the sorted values using selectionSort function
    $values = selectionSort(array_values($arr), $mode);

    // Check if the sorting mode is invalid
    if ($values == "invalid input") {
        return $values;
    }

    $res = array();
    foreach ($values as $value) {
        foreach ($keys as $key) {
            if ($arr[$key] == $value) {
                // Reconstruct the sorted array using the sorted values
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
print_r(sortArrayByKey($arr, "asc"));

// Sort the array by value in descending order and print the result
echo "<h1>c) descending order sort by value</h1>";
print_r(sortArrayByValue($arr, "desc"));

// Sort the array by key in descending order and print the result
echo "<h1>d) descending order sort by key</h1>";
print_r(sortArrayByKey($arr, "desc"));
