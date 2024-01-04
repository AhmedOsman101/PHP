<?php
function mix($s1, $s2) {
    $res = "";
    $s1 = str_split(preg_replace("/[^a-z]/", "", $s1));
    $s2 = str_split(preg_replace("/[^a-z]/", "", $s2));
    $s1Count = array_count_values($s1);
    $s2Count = array_count_values($s2);
    ksort($s1Count);
    arsort($s1Count);
    ksort($s2Count);
    arsort($s2Count);
    $letters = array_unique([...array_keys($s1Count), ...array_keys($s2Count)]);
    sort($letters);
    foreach ($s1Count as $char => $reps) {
        if (in_array($char, $s2Count)) {
        }
