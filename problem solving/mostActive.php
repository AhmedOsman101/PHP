<?php

function mostActive($customers) {
    $n = count($customers);
    $res = [];
    $counts = array_count_values($customers);
    foreach ($counts as $customer => $count) {
        if (5 < ($count / $n) * 100) array_push($res, $customer);
    }
    sort($res);
    print_r($res);
}
