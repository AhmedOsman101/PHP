<?php
function findZigZagSequence($arr) {
    sort($arr);
    $mid = ((count($arr) + 1) / 2) - 1;
    $right = array_slice($arr, $mid, -1);
    rsort($right);
    return array_merge(array_slice($arr, 0, $mid), array(max($arr)), $right);
}


$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
var_export(findZigZagSequence($arr));
