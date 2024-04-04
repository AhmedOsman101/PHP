<?php
function find($integers) {
    $odds = [];
    $evens = [];
    foreach ($integers as $value) {
        $value % 2 == 0 ? array_push($evens, $value) : array_push($odds, $value);
    }
    return sizeof($odds) == 1 ? $odds[0] : $evens[0];
}

echo find([101, 101, 102]);
