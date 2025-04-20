<?php
function gridTraveler_memo($m, $n, &$memo = []) {
    $key = "$m, $n";
    if ($m == 0 or $n == 0) return 0;
    if ($m == 1 and $n == 1) return 1;
    if (in_array($key, array_keys($memo))) return $memo[$key];
    $memo[$key] = gridTraveler_memo($m - 1, $n, $memo) + gridTraveler_memo($m, $n - 1, $memo);
    return $memo[$key];
}

var_export(gridTraveler_memo(18, 18));
var_export(gridTraveler_memo(1, 1));
