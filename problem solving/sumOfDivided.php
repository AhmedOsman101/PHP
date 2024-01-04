<?php
function sumOfDivided($arr) {
    $primes = [];
    foreach (range(1, max(array_map('abs', $arr))) as $value) {
        if (isPrime($value)) {
            $primes[$value] = 0;
        }
