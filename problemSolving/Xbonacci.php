<?php
function Xbonacci($s, $n) {
    if ($n == 0) return [];
    $size = sizeof($s);
    $res = [];
    for ($i = 0; $i < $n; $i++) {
        if ($i < $size) {
            array_push($res, $s[$i]);
        } elseif ($i >= $size) {
            array_push($res, array_sum(array_slice($res, $i - $size, $i)));
        }
    }
    return $res;
}

print_r(Xbonacci([1, 1], 10));
echo "\n";
print_r(Xbonacci([0, 0, 0, 0, 0, 0, 0, 0, 0, 0], 20));
echo "\n";
print_r(Xbonacci([1, 2, 3, 4, 5, 6, 7, 8, 9, 0], 15));
