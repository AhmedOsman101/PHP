<?php

function minTime(array $files, int $numCores, int $limit) {
    if ($numCores == 0) return; // or throw an exception
    $executeTime = 0;
    $divs = [];
    foreach ($files as $lines) {
        if ($lines % $numCores == 0) array_push($divs, $lines);
        else $executeTime += $lines;
    }
    rsort($divs);
    for ($i = 0; $i < sizeof($divs); $i++) {
        if ($i != $limit) $executeTime += ($divs[$i] / $numCores);
        else $executeTime += $divs[$i];
    }
    return $executeTime;
}
