<?php
function narcissistic(int $value): bool {
    $value = str_split("$value");
    $size = sizeof($value);
    $sum = 0;
    foreach ($value as $num) {
        $sum += pow($num, $size);
    }
    return $sum == (implode($value));
}
var_export(narcissistic(153));
