function dirReduce(&$arr) {
if (count($arr) == 0) return [];
$opposites = [
"NORTH" => "SOUTH",
"SOUTH" => "NORTH",
"EAST" => "WEST",
"WEST" => "EAST",
];
for ($i = 0; $i < sizeof($arr); $i++) { if ($i + 1 < sizeof($arr)) { $j=$i + 1; if ($arr[$i]==$opposites[$arr[$j]]) { unset($arr[$i], $arr[$j]); $arr=array_values($arr); return dirReduce($arr); } } else { return $arr; } } } $directions=["NORTH", "SOUTH" , "SOUTH" , "EAST" , "WEST" , "NORTH" , "WEST" ]; // print_r(dirReduce($directions)); // , ["WEST"]
