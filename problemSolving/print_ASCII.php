<?php
function print_ASCII() {
    echo "Char   | ASCII Code\n";
    echo "-------|---------\n";
    for ($i = 32; $i <= 127; $i++) {
        var_export(chr($i));
        echo "    | " . $i . "\n";
    }
}

print_ASCII();
