<?php
function XO($s) {
    $xos = ["o", "x"];
    $res = array_filter(str_split(strtolower($s)), fn ($value) => in_array($value, $xos));
    if (empty($res)) return true;
    if (count(array_unique($res)) == 1) return false;
    if (
        array_values(array_count_values($res))[0] == array_values(array_count_values($res))[1]
    ) return true;
    return false;
}

function XO_2($s) {
    $lower = strtolower($s);
    return substr_count($lower, 'x') === substr_count($lower, 'o');
}
print_r(XO('00xoxX0OXooXX'));
