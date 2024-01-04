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
