<?php
function maxi($arr) {
    $max = null;
    foreach ($arr as $item) if ($item > $max) $max = $item;
    return $max;
}
