<?php
function binaryArrayToNumber($arr) {
    $arr = array_reverse($arr);
    $res = 0;
    $multiplier = 1;
    for ($i = 0; $i < sizeof($arr); $i++) {
        $res += $arr[$i] * $multiplier;
        $multiplier *= 2;
    }
