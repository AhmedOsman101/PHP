function missingNumber($start, $end, $arr) {
return array_diff(range($start, $end), $arr);
}
