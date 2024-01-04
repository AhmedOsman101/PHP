<?php
function orderWeight($str) {
    $nums = explode(" ", $str);
    sort($nums);
    $weights = []; // all weights
    foreach ($nums as $value) {
        // calc weight and add its value to a new dict
        $weights["$value"] = array_sum(str_split("$value"));
    }
