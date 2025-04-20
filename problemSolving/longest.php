<?php
function longest($a, $b) {
    $res = (array_keys(array_count_values(str_split($a . $b))));
    sort($res);
    return implode($res);
}
echo longest("aretheyhere", "yestheyarehere"); // aehrsty;
