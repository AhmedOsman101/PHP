function find_emirp($n) {
$n = "$n";
$items = [];
for ($i = 2; $i < $n; $i++) { if ($i==strrev($i)) { continue; } elseif ($i !=strrev($i) and primeNum($i) and primeNum(strrev($i))) { array_push($items, +$i); } } $max=(count($items)> 0) ? max($items) : 0;
    return [count($items), $max, array_sum($items)]; //[amount of emirps in the range(13, n + 1), largest emirp smaller than n, sum of all the emirps of this range.
    }

    // print_r(find_emirp(10));
    // print_r(find_emirp(9999));
