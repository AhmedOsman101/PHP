<?php
function onlyDuplicates($str) {
    $count = array_count_values(str_split(strtolower($str)));
    $res = '';
    for ($i = 0; $i < strlen($str); $i++) {
        if ($count[$str[$i]] > 1) {
            $res .= $str[$i];
        }
