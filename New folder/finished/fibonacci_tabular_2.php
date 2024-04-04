<?php
function fibonacci_tab2($n) {
    $table = array_fill(0, $n + 1, 0);
    $table[1] = 1;
    for ($i = 0; $i <= $n; $i++) {
        if ($i + 1 <= $n) $table[$i + 1] += $table[$i];
        if ($i + 2 <= $n) $table[$i + 2] += $table[$i];
    }
    return $table[$n];
}
var_export(fibonacci_tab2(500));
