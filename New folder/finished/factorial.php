function factorial($n) {
if ($n - 1 == 0) {
return $n;
}
return $n * factorial($n - 1);
}
// print_r(factorial(5)); // 5! => 5*4*3*2*1=120
