<?php
function findShort($str) {
    $minWord = strlen($str);
    $str = explode(" ", $str);
    foreach ($str as $word) {
        if (min($minWord, strlen($word)) != $minWord) $minWord = strlen($word);
    }
    return $minWord;
}
print_r(findShort("turns out random test cases are easier than writing out basic ones"));
