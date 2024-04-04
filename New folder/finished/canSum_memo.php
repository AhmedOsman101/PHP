function canSum_memo($target, $nums, &$memo = []) {
if (in_array($target, $nums) or $target == 0) return true;
if (in_array($target, array_keys($memo))) return $memo[$target];
if ($target < 0) return false; foreach ($nums as $val) { $nextTarget=$target - $val; if (canSum_memo($nextTarget, $nums, $memo)) { $memo[$target]=true; return $memo[$target]; } } $memo[$target]=false; return $memo[$target]; } // var_export(canSum_memo(7, [5, 4, 3, 7])); // var_export(canSum_memo(31, [7, 9])); // var_export(canSum_memo(300, [7, 14])); // var_export(canSum_memo(3000, [7, 14]));
