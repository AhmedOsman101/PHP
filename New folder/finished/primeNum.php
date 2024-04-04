function primeNum($num) {
$result = "{$num} is prime";
for ($i = 2; $i < $num; $i++) if ($num % $i==0) return false; return true; }
