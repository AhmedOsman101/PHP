<?php
function insertVal2(&$arr, $val, $index) {
    $right = [];
    $left = [];
    $middle = [$val];
    for ($i = 0; $i < $index; $i++) {
        $left[] = $arr[$i];
    }
