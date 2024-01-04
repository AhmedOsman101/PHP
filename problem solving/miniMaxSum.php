<?php

function miniMaxSum($arr) {
    $minSum = 0;
    $maxSum = 0;
    sort($arr);
    for ($i = 0; $i < 4; $i++) $minSum += $arr[$i];
    rsort($arr);
    for ($i = 0; $i < 4; $i++) $maxSum += $arr[$i];
    echo "{$minSum} {$maxSum}\n";
}
