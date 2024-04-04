function removeNb($n) {
// echo $n . "\n";
$range = range(1, $n);
$total = array_sum($range);
$res = array();
foreach ($range as $first) {
$second = ($total % $first) + $first;
if (($total - ($first + $second)) == ($first * $second)) {
array_push($res, [$first, $second], [$second, $first]);
}
}
sort($res);
return $res;
}

// print_r(removeNb(101)); // 5151 => [[55, 91], [91, 55]]
// print_r(removeNb(1000003)); // 351 => [[15, 21], [21, 15]]
// echo (5151-91)%91;
// echo (351-21-15)%21*15;
// echo (5151%55)+55;
