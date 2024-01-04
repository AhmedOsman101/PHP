<?php
function crack($hash) {
    for ($a = 0; $a < 10; $a++) {
        for ($b = 0; $b < 10; $b++) {
            for ($c = 0; $c < 10; $c++) {
                for ($d = 0; $d < 10; $d++) {
                    for ($e = 0; $e < 10; $e++) {
                        if (md5($a . $b . $c . $d . $e) == $hash) return $a . $b . $c . $d . $e;
                    }
                }
            }
        }
    }
}

var_export(crack(md5(12351)));