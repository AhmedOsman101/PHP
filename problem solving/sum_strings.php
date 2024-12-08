<?php
function sum_strings($a, $b) {
    [$a, $b] = [strrev($a), strrev($b)];
    $res = "";
    $len = max(strlen($a), strlen($b)) + 1;
    $carry = 0;
    for ($i = 0; $i < $len; $i++) {
        echo "S///////////////////////////////////////////////////////////////////\n";
        $na = isset($a[$i]) ? (int) $a[$i] : 0;
        $nb = isset($b[$i]) ? (int) $b[$i] : 0;
        echo "values:" . $na + $nb . " remainder:" . $carry . PHP_EOL;
        if (($na + $nb + $carry) < 10 and !empty($carry)) {
            $res .= ($na + $nb + $carry);
            $carry = 0;
        } elseif (($na + $nb + $carry) >= 10 and !empty($carry)) {
            $res .= ($na + $nb + $carry - 10);
            $carry = 1;
        } elseif (($na + $nb) < 10 and empty($carry)) {
            $res .= $na + $nb + $carry;
            $carry = 0;
        } elseif (($na + $nb) >= 10 and empty($carry)) {
            $res .= ($na + $nb) - 10;
            $carry = 1;
        }
        echo "E///////////////////////////////////////////////////////////////////\n\n";
    }
    return ltrim(strrev($res), "0");
}

$a = "712569312664357328695151392";
$b = "8100824045303269669937";
$c = sum_strings($a, $b);
echo "$c\n";
echo ($a + $b) . PHP_EOL;
var_export(($a + $b) == $c);
