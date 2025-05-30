<?php
function howSum_memo($target, $nums, &$memo = []) {
    if ($target == 0) return [];
    if ($target < 0) return null;
    if (in_array($target, array_keys($memo))) return $memo[$target];
    if (in_array($target, $nums)) return [$target];
    foreach ($nums as $val) {
        $nextTarget = $target - $val;
        $res = howSum_memo($nextTarget, $nums, $memo);
        if ($res) {
            $memo[$target] = [...$res, $val];
            return $memo[$target];
        }
    }
    $memo[$target] = null;
    return $memo[$target];
}
var_export(howSum_memo(7, [2, 3])); // [3, 2, 2] 
echo "\n";
var_export(howSum_memo(7, [5, 3, 4, 7])); // [7] 
echo "\n";
var_export(howSum_memo(7, [5, 3])); // null 
echo "\n";
var_export(howSum_memo(8, [2, 3, 5])); // [2, 2, 2, 2] 
echo "\n";
var_export(howSum_memo(300000, [7, 14])); // null 
