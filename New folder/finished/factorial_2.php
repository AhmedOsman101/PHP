function factorial($n) {
if ($n <= 1) return 1; $f=1; for ($i=$n; $i>= 2; --$i) {
    $f *= $i;
    }
    return $f;
    }

    // factorial(5);
