function lexicographical($arr) {
// Convert the numbers to strings
$stringNumbers = array_map('strval', $arr);
// Sort the array in lexicographical order
sort($stringNumbers);
print_r($stringNumbers);
}
// lexicographical("abc");
