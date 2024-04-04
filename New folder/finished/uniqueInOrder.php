function uniqueInOrder($str) {
if (!is_array($str)) $str = str_split($str);
if (sizeof($str) < 1) return []; if (sizeof($str)==1) return $str; $ret=[]; for ($i=0; $i < sizeof($str); $i++) { if (empty($ret)) array_push($ret, $str[$i]); if ($str[$i] !=$ret[sizeof($ret) - 1]) { array_push($ret, $str[$i]); } } return $ret; } // var_export(uniqueInOrder([1, 2, 2, 3]));
