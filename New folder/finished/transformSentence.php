<?php
function transformSentence($str) {
    $str = explode(" ", $str);
    for ($i = 0; $i < sizeof($str); $i++) {
        for ($j = 1; $j < strlen($str[$i]); $j++) {
            if (strtolower($str[$i][$j - 1]) < strtolower($str[$i][$j])) {
                $str[$i][$j] = strtoupper($str[$i][$j]);
            } elseif (strtolower($str[$i][$j - 1]) > strtolower($str[$i][$j])) {
                $str[$i][$j] = strtolower($str[$i][$j]);
            }
        }
    }
    $str = implode(" ", $str);
    return $str;
}
