<?php
function spinWords(string $str): string {
    $str = explode(" ", $str);
    foreach ($str as &$word) {
        if (strlen($word) >= 5) {
            $word = strrev($word);
        }
