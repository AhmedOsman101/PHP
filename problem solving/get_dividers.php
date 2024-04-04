<?php
function get_dividers($values, $powers) {
    $total = 1;
    $res = array();
    for ($i = 0; $i < sizeof($values); $i++) {
        $total *= pow($values[$i], $powers[$i]);
    }
    for ($i = 1; $i <= $total; $i++) {
        if ($total % $i == 0) {
            array_push($res, $i);
        }
    }
    return $res;
}
