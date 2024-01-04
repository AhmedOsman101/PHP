<?php
function odd_or_even(array $a): string {
    $total = array_reduce($a, function ($prev, $current) {
        $prev += $current;
        return $prev;
    });
