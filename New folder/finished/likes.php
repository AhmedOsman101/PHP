function likes($names) {
switch (count($names)) {
case 0:
return 'no one likes this';
case 1:
return array_values($names)[0] . ' likes this';
case 2:
return array_values($names)[0] . " and " . array_values($names)[1] . ' like this';
case 3:
return array_values($names)[0] . ", " . array_values($names)[1] . " and " . array_values($names)[2] . ' like this';
default:
$res = array_values($names)[0] . ", " . array_values($names)[1] . " and " . count(array_slice($names, 2))
. ' others like this';
return $res;
}
}
// print_r(likes(['Alex', 'Jacob', 'Mark', 'Max']));
