<?php
function duplicateCount($str) {
    return count(array_filter(array_count_values(str_split(strtolower($str))), function ($item) {
        return $item > 1;
    }));
}
