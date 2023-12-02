<?php

function mergeSort($array) {
    if (count($array) == 1) return $array;
    $mid = count($array) / 2;
    $left = array_slice($array, 0, $mid);
    $right = array_slice($array, $mid);
    $left = mergeSort($left);
    $right = mergeSort($right);
    return merge($left, $right);
}

function merge($left, $right) {
    $result = array();
    $leftIndex = 0;
    $rightIndex = 0;

    while ($leftIndex < count($left) && $rightIndex < count($right)) {
        if ($left[$leftIndex] > $right[$rightIndex]) {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        } else {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        }
    }
    while ($leftIndex < count($left)) {
        $result[] = $left[$leftIndex];
        $leftIndex++;
    }
    while ($rightIndex < count($right)) {
        $result[] = $right[$rightIndex];
        $rightIndex++;
    }
    return $result;
}

function gnomeSort(&$array) {
    $i = 0;
    while ($i < count($array)) {
        if ($i == 0 || $array[$i] >= $array[$i - 1]) $i++;
        else {
            [$array[$i], $array[$i - 1]] = [$array[$i - 1], $array[$i]];
            $i--;
        }
    }
    return $array;
}

function heapify(&$array, $i, $t) {
    $max = $i;
    $l = 2 * $i + 1;
    $r = 2 * $i + 2;

    if ($l < $t && $array[$l] > $array[$max]) $max = $l;
    if ($r < $t && $array[$r] > $array[$max])  $max = $r;

    if ($max != $i) {
        [$array[$i], $array[$max]] = [$array[$max], $array[$i]];
        heapify($array, $max, $t);
    }
}

function heapSort(&$array) {
    $t = count($array);
    for ($i = $t; $i >= 0; $i--)  heapify($array, $i, $t);
    for ($i = $t - 1; $i >= 0; $i--) {
        [$array[0], $array[$i]] = [$array[$i], $array[0]];
        heapify($array, 0, $i);
    }
    return $array;
}

function shellSort(&$array) {
    $gap = floor(count($array) / 2);
    while ($gap > 0) {
        for ($i = $gap; $i < count($array); $i++) {
            $val = $array[$i];
            $j = $i;
            while ($j >= $gap && $array[$j - $gap] > $val) {
                $array[$j] = $array[$j - $gap];
                $j -= $gap;
            }
            $array[$j] = $val;
        }
        $gap = floor($gap / 2);
    }
    return $array;
}

function quickSort($arr, $mode) {
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

function selectionSort(&$arr, $mode) {
    for ($i = 0; $i < sizeof($arr); $i++) {
        for ($j = ($i + 1); $j < sizeof($arr); $j++) {
            if ($arr[$j] < $arr[$i]) {
                [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
            }
        }
    }
    if (strtolower($mode) == "asc") return $arr;
    elseif (strtolower($mode) == "desc") {
        $arr = array_reverse($arr);
        return $arr;
    } else return "invalid input";
}

$arr = [9999, 5, 500, -500, 3, 50];

