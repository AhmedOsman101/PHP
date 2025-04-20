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
            $hexa .= "00";
        } else if ($val <= 15) {
            $hexa .= "0{$hexCode[$val]}";
        } else {
            $temp = '';
            while (true) {
                if (($val / 16) > 0) {
                    echo $val . ": first\n";
                    $temp .= $hexCode[$val % 16];
                    $val = intval($val / 16);
                    echo $val . ": second\n";
                } else {
                    break;
                }
            }
            $hexa .= strrev($temp);
        }
    }
    return '#' . $hexa;
    // other Split Strings:
    // return dechex($r) . dechex($g) . dechex($b);
}
echo rgb(1, 2, 1) . "\n";
echo rgb(-500, 0, 0);
