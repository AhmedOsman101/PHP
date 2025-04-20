<?php
function detect_pangram($string) {
    $string = str_split(strtoupper($string));
    $alphabet = range("A", "Z");
    foreach ($alphabet as $char) {
        if (!in_array($char, $string)) {
            return false;
        }
    }
    return true;
}

var_export(detect_pangram("The quick brown fox jumps over the lazy dog"));
