<?php

function orderWeight($str) {
    $nums = explode(" ", $str);
    sort($nums);
    $weights = []; // all weights
    foreach ($nums as $value) {
        // calc weight and add its value to a new dict
        $weights["$value"] = array_sum(str_split("$value"));
    }

    asort($weights);
    $temp = [];

    foreach (array_keys($weights) as $value) {
        while (in_array($value, $nums)) {
            array_push($temp, $value);
            unset($nums[array_search($value, $nums)]);
        }
    }

    for ($i = 0; $i < sizeof($temp); $i++) {
        for ($j = ($i + 1); $j < sizeof($temp); $j++) {
            $first = &$temp[$i];
            $second = &$temp[$j];
            if ($weights[$first] == $weights[$second]) {
                if (strcmp(strval($second), strval($first)) < 0) {
                    [$first, $second] = [$second, $first];
                }
            }
        }
    }
    return implode(' ', ($temp));
}
// print_r(orderWeight("2000 10003 1234000 44444444 9999 11 11 22 123"));
//          sorted: "11 11 22 123 2000 9999 10003 1234000 44444444"
//             out: "11 11 2000 10003 22 123 1234000 44444444 9999"
//               w: "2  2  2     4     4   6    10     32      36"
