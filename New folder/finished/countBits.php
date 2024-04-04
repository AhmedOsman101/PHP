function countBits($n) {
return array_count_values(str_split(strval(decbin($n))))[1];
}
// echo "This is\nan\nexample\nrow";
// echo countBits(7);
