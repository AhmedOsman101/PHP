<?php
function isIsogram($str) {
    foreach (array_count_values(str_split(strtolower($str))) as $val) {
        if ($val > 1) return false;
    }
    return true;
}
