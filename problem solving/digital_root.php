<?php
function digital_root($number) {
    $res = 0;
    $number = str_split("$number");
    for ($i = 0; $i < count($number); $i++) {
        $res += $number[$i];
    }
}