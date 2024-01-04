<?php
function removeNb($n) {
    // echo $n . "\n";
    $range = range(1, $n);
    $total = array_sum($range);
    $res = array();
    foreach ($range as $first) {
        $second = ($total % $first) + $first;
        if (($total - ($first + $second)) == ($first * $second)) {
            array_push($res, [$first, $second], [$second, $first]);
        }
