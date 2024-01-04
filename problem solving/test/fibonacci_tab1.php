<?php
function fibonacci_tab1($n) {
    $table = array_fill(0, $n + 1, 0);
    $table[1] = 1;
    for ($i = 0; $i <= $n; $i++) {
        @$table[$i + 1] += $table[$i];
        @$table[$i + 2] += $table[$i];
    }
