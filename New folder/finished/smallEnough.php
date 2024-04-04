function smallEnough($a, $limit) {
foreach ($a as $n) {
if ($limit < $n) return false; } return true; // return max($a) <=$limit; } // var_export(smallEnough([66, 101], 200));
