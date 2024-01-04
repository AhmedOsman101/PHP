<?php
function fibonacci_tab1($n) {
    if ($n == 0 or $n == 1) return 1;
    $table = array_fill(0, $n + 1, 0);
    $table[1] = 1;
    for ($i = 0; $i <= $n; $i++) {
        @$table[$i + 1] += $table[$i];
        @$table[$i + 2] += $table[$i];
    }
    return $table[count($table) - 1];
}

var_export(fibonacci_tab1(0));
echo "\n";
var_export(fibonacci_tab1(1));
echo "\n";
var_export(fibonacci_tab1(2));
echo "\n";
var_export(fibonacci_tab1(3));
echo "\n";
var_export(fibonacci_tab1(4));
echo "\n";
var_export(fibonacci_tab1(10));
echo "\n";
var_export(fibonacci_tab1(40));
echo "\n";
var_export(fibonacci_tab1(400));
echo "\n";
