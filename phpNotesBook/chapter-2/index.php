<?php

declare(strict_types=1);

include __DIR__ . "/../utils.php";

$var  = "foo";
$foo  = "bar";
$bar  = "bazz";
$bazz = "buzz";

println("x", $var, $$var, $$$var, $$$$var);
