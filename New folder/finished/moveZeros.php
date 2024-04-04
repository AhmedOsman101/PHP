function moveZeros(array $arr): array {
$left = array();
$right = array();
for ($i = 0; $i < sizeof($arr); $i++) { if ($arr[$i]===0 or $arr[$i]===floatval(0.0)) { $right[]=0; } else { $left[]=$arr[$i]; } } return array_merge($left, $right); } // print_r(moveZeros([9, 0.0, null, 0, 9, 1, 2, 0, 1, 0, 1, 0.0, 3, 0, 1, 9, 0, 0, 0, 0, 9]));
