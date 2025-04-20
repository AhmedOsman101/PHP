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
            $daysCount++;
            $seconds -= $oneDay;
        } elseif ($seconds - $oneHour >= 0) {
            $hoursCount++;
            $seconds -= $oneHour;
        } elseif ($seconds - $oneMinute >= 0) {
            $minutesCount++;
            $seconds -= $oneMinute;
        } elseif ($seconds < $oneMinute) {
            break;
        }
    }
    #################################
    switch ($yearsCount) {
        case 1:
            $yearsCount = "$yearsCount year";
            break;
        case 0:
            $yearsCount = "";
            break;
        default:
            $yearsCount = "$yearsCount years";
            break;
    }

    #################################

    switch ($daysCount) {
        case 1:
            $daysCount = "$daysCount day";
            break;
        case 0:
            $daysCount = "";
            break;
        default:
            $daysCount = "$daysCount days";
            break;
    }
    #################################
    switch ($hoursCount) {
        case 1:
            $hoursCount = "$hoursCount hour";
            break;
        case 0:
            $hoursCount = "";
            break;
        default:
            $hoursCount = "$hoursCount hours";
            break;
    }
    ################################# 
    switch ($minutesCount) {
        case 1:
            $minutesCount = "$minutesCount minute";
            break;
        case 0:
            $minutesCount = "";
            break;
        default:
            $minutesCount = "$minutesCount minutes";
            break;
    }
    ################################# 
    switch ($seconds) {
        case 1:
            $seconds = "$seconds second";
            break;
        case 0:
            $seconds = "";
            break;
        default:
            $seconds = "$seconds seconds";
            break;
    }
    $finalCount = [
        "years" => $yearsCount,
        "days" => $daysCount,
        "hours" => $hoursCount,
        "minutes" => $minutesCount,
        "seconds" => $seconds
    ];

    $res = array_reverse(array_values(array_filter(array_values($finalCount), function ($item) {
        return $item != "";
    })));
    $finalRes = "";
    for ($i = sizeof($res) - 1; $i >= 0; $i--) {
        if ($i == 0) {
            $finalRes .= "$res[$i]";
        } elseif ($i == 1) {
            $finalRes .= "$res[$i] and ";
        } else {
            $finalRes .= "$res[$i], ";
        }
    }
    return $finalRes;
}

print_r(format_duration(31626060));
echo "\n";
print_r(format_duration(121));
