<?php
function Xbonacci($s, $n) {
    if ($n == 0) return [];
    $size = sizeof($s);
    $res = [];
    for ($i = 0; $i < $n; $i++) {
        echo "$i>";
        if ($i < $size) {
            array_push($res, $s[$i]);
        } elseif ($i >= $size) {
