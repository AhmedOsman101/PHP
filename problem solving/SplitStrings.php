<?php
function SplitStrings($str) {
    if (empty($str)) return array();
    $str = array_values(str_split($str, 2));
    foreach ($str as &$char) {
        $char = str_pad($char, 2, "_", STR_PAD_RIGHT);
    }
