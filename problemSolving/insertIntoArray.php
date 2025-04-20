<?php
function insertIntoArray(&$arr, $val, $index) {
    $right = $left = [];
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
