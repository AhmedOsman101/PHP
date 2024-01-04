<?php
function tribonacci($signature, $n) {
    $res = [];
    if ($n == 0) return $res;
    $i = 0;
    while (true) {
        if (sizeof($res) == $n) break;
        if ($i <= 2) {
            array_push($res, $signature[$i]);
        } else if ($i == 3) {
