<?php
function fibonacci_memo($n, &$memo = []) {
    if (in_array($n, array_keys($memo))) return $memo[$n];
    if ($n <= 2) return 1;
    $memo[$n] = fibonacci_memo($n - 1, $memo) + fibonacci_memo($n - 2, $memo);
    return $memo[$n];
}

// echo (fibonacci_memo(0)) . "\n";
// echo (fibonacci_memo(1)) . "\n";
// echo (fibonacci_memo(2)) . "\n";
// echo (fibonacci_memo(3)) . "\n";
// echo (fibonacci_memo(4)) . "\n";
// echo (fibonacci_memo(10)) . "\n";
// echo (fibonacci_memo(40)) . "\n";
// echo (fibonacci_memo(400)) . "\n";
