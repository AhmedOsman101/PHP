<?php
function twoSum($nums, $target) {
    for ($i = 0; $i < sizeof($nums); $i++) {
        if (in_array($target - $nums[$i], $nums) and $target - $nums[$i] != $nums[$i]) return [$i, array_search($target - $nums[$i], $nums)];
    }
}
