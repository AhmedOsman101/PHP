<?php
function fibonacci_memo($n, &$memo = []) {
    if (in_array($n, array_keys($memo))) return $memo[$n];
    if ($n <= 2) return 1;
    $memo[$n] = fibonacci_memo($n - 1, $memo) + fibonacci_memo($n - 2, $memo);
    return $memo[$n];
}
