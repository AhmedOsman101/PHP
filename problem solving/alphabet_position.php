<?php
function alphabet_position(string $s): string {
    $s = str_split(strtolower(preg_replace('/[^a-zA-Z]/', "", $s)));
    if (empty(implode($s))) return '';
    $s = array_map(fn ($char) => ord($char) - 96, $s);
    return implode(" ", $s);
}
