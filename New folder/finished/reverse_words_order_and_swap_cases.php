function reverse_words_order_and_swap_cases($str) {
$str = explode(" ", $str);
for ($i = 0; $i < sizeof($str); $i++) { for ($j=0; $j < strlen($str[$i]); $j++) { if (ctype_lower($str[$i][$j])) { $str[$i][$j]=strtoupper($str[$i][$j]); } elseif (ctype_upper($str[$i][$j])) { $str[$i][$j]=strtolower($str[$i][$j]); } } } $str=implode(" ", array_reverse($str));
    return $str;
}
