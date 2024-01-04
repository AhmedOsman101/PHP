<?php

function lonelyInteger($a) {
    $count = array_count_values($a);
    foreach ($count as $key => $value) {
        if ($value == 1) {
            return $key;
        }
    }
    return "none";
}
