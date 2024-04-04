<?php
function basicOp($op, $val1, $val2) {
    switch ($op) {
        case '+':
            return $val1 + $val2;
        case '-':
            return $val1 - $val2;
        case '*':
            return $val1 * $val2;
        case '/':
            return $val1 / $val2;
        default:
            return "error";
    }
}
