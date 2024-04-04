function alphabet_position(string $s): string {
$s = str_split(strtolower(preg_replace('/[^a-zA-Z]/', "", $s)));
if (empty(implode($s))) return '';
$s = array_map(fn ($char) => ord($char) - 96, $s);
return implode(" ", $s);
}
$s = 'h8j9psWLdCOYt^?3*q-g2.po?UYp Lr2$ 8b5*?fT$?wHk8)8?koayXrLq%Hr&BCGIhUy9L!SnVZgJJ@UDR.iD#ffLw)wq?n?hlgYFEX@y0v,Iij8NBW9$UdKbpRizZ9^(8cGVRc&XPOvTmAWcLLt2LVHf5xs.c2lMXohAPQ%6uO$zu-WB,AnDl@fa%z@';
// var_export(alphabet_position($s));
