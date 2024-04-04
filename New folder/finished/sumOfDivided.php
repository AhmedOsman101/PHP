<?php
require 'isPrime.php';
function sumOfDivided($arr) {
    $primes = [];
    foreach (range(1, max(array_map('abs', $arr))) as $value) {
        if (isPrime($value)) {
            $primes[$value] = 0;
        }
    }
    foreach (array_keys($primes) as &$second) {
        $divisible = false;
        foreach ($arr as $first) {
            if ($first % $second == 0) {
                $divisible = true;
                $primes[$second] += $first;
            }
        }
        if (!$divisible) {
            unset($primes[$second]);
        }
    }
    $final = [];
    foreach ($primes as $key => $value) {
        array_push($final, [$key, $value]);
    }
    return ($final);
}
print_r(sumOfDivided([12, 15]));
$x = array(35, 18, 25, 35, -45, 27, -22, 31, 49, 42, 33, 37, 18, 50, 48, 29, 45, 15, -56, 39, -79, 23, 46);


print_r(sumOfDivided($x));
// sumOfDivided([15, 21, 24, 30, -45]) => [[2, 54], [3, 45], [5, 0], [7, 21]];
