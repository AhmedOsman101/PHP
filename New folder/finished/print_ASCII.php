function print_ASCII(){
echo "Char | ASCII Code\n";
echo "-----|-----------\n";
for ($i = 32; $i <= 127; $i++) { echo chr($i) . "    | " . $i . "\n" ; } }
