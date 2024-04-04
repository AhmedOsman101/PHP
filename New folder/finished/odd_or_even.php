function odd_or_even(array $a): string {
$total = array_reduce($a, function ($prev, $current) {
$prev += $current;
return $prev;
});
return $total % 2 == 0 ? "even" : "odd";
}

// print_r(odd_or_even([0]));
