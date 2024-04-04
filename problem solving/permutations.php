<?php
function permutations($s) {
    $res = [];
    if (count($s) == 3) {
        // array_push($res);
    }
    $sorted = false;
    while (!$sorted) {
    }


    sort($res);
    return $res;
}

print_r(permutations(["cab", "abc", "cba"]));
