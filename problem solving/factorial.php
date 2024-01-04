<?php
function factorial($n) {
    if ($n == 0 OR $n == 1) return 1;
    $f = 1;
    for ($i = $n; $i >= 2; --$i) $f *= $i;
    return $f;
}
echo factorial(0);
echo "\n";
echo factorial(1);
echo "\n";
echo factorial(50);
echo "\n";
