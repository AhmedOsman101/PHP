<?php

/*
1) Write a PHP script that removes the whitespaces from a
string. Sample string: 'The quick " " brown fox' Expected
Output: 'Thequick""brownfox'
*/

function removeSpaces($str): string {
    return str_replace(" ", "", $str);
}

var_export(removeSpaces('The quick " " brown fox'));
echo "<br>";

/*
2) Write a PHP script to extract text (within parenthesis) from a
string. Sample strings:'The quick brown [fox].' Expected
Output: 'fox'
*/
function extractFromBraces($str) {
    preg_match_all('/[\{\[\(][^\]\}\)]+[\}\]\)]/', $str, $matches);
    $matches = $matches[0];
    foreach ($matches as &$match) {
        $match = preg_replace('/[\{\[\(]/', "", $match);
        $match = preg_replace('/[\}\]\)]/', "", $match);
    }
    return implode($matches);
}
var_export(extractFromBraces('The quick [fox] {fox} (fox) brown fox'));
echo "<br>";
