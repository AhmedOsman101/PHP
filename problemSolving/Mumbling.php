<?php
function Mumbling($s) {
    return implode("-", array_map(function ($index, $value) {
        return ucfirst(str_repeat($value, ($index + 1)));
    }, array_keys(str_split(strtolower($s))), str_split(strtolower($s))));
}
