<?php
function moveZeros(array $arr): array {
    $left = array();
    $right = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        if ($arr[$i] === 0 or $arr[$i] === floatval(0.0)) {
            $right[] = 0;
        } else {
