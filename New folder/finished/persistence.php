function persistence(int $num) {
if (strlen("$num") == 1) {
return 0;
}
$counter = 0;
$res = 1;
while (true) {
$num = str_split("$num");
for ($i = 0; $i < sizeof($num); $i++) { $res *=$num[$i]; } if (strlen("$res")> 1) {
    $counter++;
    $num = $res;
    $res = 1;
    } else if (strlen("$res") == 1) {
    $counter++;
    return $counter;
    }
    }
    }
    // print_r(persistence(999));
