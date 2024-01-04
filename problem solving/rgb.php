<?php
function rgb($r, $g, $b) {
    $deciColor = array($r, $g, $b);
    $hexa = '';
    $hexCode = array(
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => 'A',
        '11' => 'B',
        '12' => 'C',
        '13' => 'D',
        '14' => 'E',
        '15' => 'F',
    );
    foreach ($deciColor as $val) {
        if ($val >= 255) {
            $hexa .= "FF";
        } elseif (0 >= $val) {
