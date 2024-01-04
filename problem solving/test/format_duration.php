<?php
function format_duration($seconds) {
    if ($seconds == 0) return "now";
    #################################
    $oneMinute = 60;
    $oneHour = 3600;
    $oneDay = 86400;
    $oneYear = 31536000;
    #################################
    $yearsCount = 0;
    $daysCount = 0;
    $hoursCount = 0;
    $minutesCount = 0;
    #################################

    while (true) {
        if ($seconds >= $oneYear) {
            $yearsCount++;
            $seconds -= $oneYear;
        } elseif ($seconds - $oneDay >= 0) {
