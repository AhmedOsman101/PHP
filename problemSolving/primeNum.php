<?php
function primeNum($num) {
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}
