<?php
function countBits($n) {
    return array_count_values(str_split(strval(decbin($n))))[1];
}
