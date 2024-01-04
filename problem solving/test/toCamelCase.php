<?php
function toCamelCase($str) {
    $str = str_split($str);
    for ($i = 0; $i < sizeof($str); $i++) {
        if ($str[$i] == "_" or $str[$i] == "-") {
            unset($str[$i]);
            $str[$i + 1] = strtoupper($str[$i + 1]);
        }
