<?php
function highestRank($arr) {
    $countValues = array_count_values($arr);
    arsort($countValues);
    $maxValues = array();
    foreach ($countValues as $key => $value) {
        if ($value == max(array_values($countValues))) {
            array_push($maxValues, $key);
        }
    }
    return max($maxValues);
}
