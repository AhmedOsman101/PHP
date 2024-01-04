<?php
function detect_pangram($string) {
    $string = str_split(strtoupper($string));
    $alphabet = range("A", "Z");
    foreach ($alphabet as $char) {
        if (!in_array($char, $string)) {
            return false;
        }
