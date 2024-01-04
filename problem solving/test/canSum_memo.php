<?php
function canSum_memo($target, $nums, &$memo = []) {
    if (in_array($target, $nums) or $target == 0) return true;
    if (in_array($target, array_keys($memo))) return $memo[$target];
    if ($target < 0) return false;
    foreach ($nums as $val) {
        $nextTarget = $target - $val;
        if (canSum_memo($nextTarget, $nums, $memo)) {
            $memo[$target] = true;
            return $memo[$target];
        }
    }
}
