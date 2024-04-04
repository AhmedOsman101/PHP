function human_readable($seconds) {
$oneHour = 3600;
$oneMinute = 60;
$hoursCount = (floor($seconds / $oneHour));
$minutesCount = (floor($seconds / $oneMinute) % 60);
$seconds = floor($seconds) % 60;
return ($hoursCount < 10 ? "0$hoursCount:" : "$hoursCount:" ) . ($minutesCount < 10 ? "0$minutesCount:" : "$minutesCount:" ) . ($seconds < 10 ? "0$seconds" : "$seconds" ); } // print_r(human_readable(359999));
