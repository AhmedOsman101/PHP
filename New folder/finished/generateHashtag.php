function generateHashtag($str) {
if (empty($str)) return false;
$res = "";
foreach (explode(" ", trim($str)) as $word) {
if (!empty($word)) $res .= ucfirst($word);
}
if (empty($res)) return false;
return strlen("#$res") > 140 ? false : "#$res";
}
// print_r(generateHashtag(" hello world "));
// print_r(generateHashtag(str_repeat("a", 139)));
// echo strlen("#Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
