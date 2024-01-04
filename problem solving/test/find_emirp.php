<?php
function find_emirp($n) {
    $n = "$n";
    $items = [];
    for ($i = 2; $i < $n; $i++) {
        if ($i == strrev($i)) {
            continue;
        } elseif ($i != strrev($i) and primeNum($i) and primeNum(strrev($i))) {
