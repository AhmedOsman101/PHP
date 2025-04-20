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
            array_push($res, array_sum($res));
        } else {
            array_push($res, array_sum([$res[$i - 3], $res[$i - 2], $res[$i - 1]]));
        }
        $i++;
    }
    return $res;
} 
print_r(tribonacci([1, 1, 1], 1000));
