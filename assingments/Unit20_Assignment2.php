<?php

// 1) Write a PHP program to find the first non-repeated character in a given string.
function nonReapeat($s) {
    foreach (array_count_values(str_split($s)) as $key => $value) {
        if ($value == 1) {
            return $key;
        }
    }
    return "no unique values";
}
echo (nonReapeat("abccdd")) . " <br>";
echo (nonReapeat("abccdda")) . " <br>";
echo (nonReapeat("abbccdda")) . " <br>";

// 2) Write a PHP program to print the number of prime numbers which are less than or equal to a given integer.
// function to determine if number is prime or not
function isPrime($n) {
    if ($n <= 1) return false;
    if ($n == 2) return true;
    if ($n % 2 == 0) return false;
    for ($i = 3; $i < $n; $i++) if ($n % $i == 0) return false;
    return true;
}
// function to count n.o of prime numbers under the given input
function countPrimes($n) {
    $res = array();
    for ($i = 2; $i <= $n; $i++) if (isPrime($i)) array_push($res, $i);
    return sizeof($res) == 0 ? "no primes found" : sizeof($res);
}

print_r(countPrimes(20));
// print_r(countPrimes(1));
