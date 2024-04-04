function numPrimorial($n) {
require('./isPrime.php');
$res = 1;
$i = 0;
$num = 1;
while ($i < $n) { if (isprime($num)) { $res *=$num; $num++; $i++; } else { $num++; } } return $res; } // var_export(numPrimorial(3));
