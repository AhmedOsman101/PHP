function sum_strings($a, $b) {
[$a, $b] = [strrev($a), strrev($b)];
$res = "";
$len = max(strlen($a), strlen($b)) + 1;
$remainder = 0;
for ($i = 0; $i < $len; $i++) { echo "S///////////////////////////////////////////////////////////////////\n" ; $na=isset($a[$i]) ? (int)$a[$i] : 0; $nb=isset($b[$i]) ? (int)$b[$i] : 0; echo "values:" . $na + $nb . " remainder:" . $remainder . "\n" ; if (($na + $nb + $remainder) < 10 and !empty($remainder)) { $res .=($na + $nb + $remainder); $remainder=0; } elseif (($na + $nb + $remainder)>= 10 and !empty($remainder)) {
    $res .= ($na + $nb + $remainder - 10);
    $remainder = 1;
    } elseif (($na + $nb) < 10 and empty($remainder)) { $res .=$na + $nb + $remainder; $remainder=0; } elseif (($na + $nb)>= 10 and empty($remainder)) {
        $res .= ($na + $nb) - 10;
        $remainder = 1;
        }
        echo "E///////////////////////////////////////////////////////////////////\n\n";
        }
        return ltrim(strrev($res), "0");
        }

        // $a = "712569312664357328695151392";
        // $b = "8100824045303269669937";
        // echo sum_strings($a, $b) . "\n";
        // echo ($a + $b) . "\n";
