<?php
function duplicate_encode($word) {
    $word = str_split(strtolower($word));
    $charCount = array_count_values(($word));
    $res = "";
    foreach ($word as $char) ($charCount[$char] <= 1) ? $res .= "(" : $res .= ")";
}
