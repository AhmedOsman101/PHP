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
