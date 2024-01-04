<?php
function find($integers) {
    $odds = [];
    $evens = [];
    foreach ($integers as $value) {
        $value % 2 == 0 ? array_push($evens, $value) : array_push($odds, $value);
    }
