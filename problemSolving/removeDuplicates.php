<?php
function removeDuplicates(&$nums) {
    return array_merge(array_unique($nums), array_fill(0, sizeof($nums) - sizeof(array_unique($nums)), "_"));
}

$nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
var_export(array_reverse($nums));
echo "\n";
var_export(removeDuplicates($nums) == [0, 1, 2, 3, 4, "_", "_", "_", "_", "_"]);
