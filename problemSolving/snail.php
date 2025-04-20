<?php
function snail($arr) {
    if (empty($arr)) return [[]];
    $res = [];
    while (0 < sizeof($arr)) {
        $res = array_merge($res, array_shift($arr));
        foreach ($arr as &$row) array_push($res, array_pop($row));
        if (!empty($arr)) $res = array_merge($res, array_reverse(array_pop($arr)));
        for ($i = sizeof($arr) - 1; $i > -1; $i--) array_push($res, array_shift($arr[$i]));
    }
    return $res;
}

var_export(snail([
    [1, 2, 3, 4, 5],
    [6, 7, 8, 9, 10],
    [11, 12, 13, 14, 15],
    [16, 17, 18, 19, 20],
    [21, 22, 23, 24, 25]
]));

var_export(snail([
    [1, 2, 3, 1],
    [4, 5, 6, 4],
    [7, 8, 9, 7],
    [7, 8, 9, 7]
]));
