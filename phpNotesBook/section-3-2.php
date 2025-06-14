<?php

/* Section 3.2: Static properties and variables */

declare(strict_types=1);

include_once "./utils.php";

function generateId(): int {
  static $id = 1;
  return $id++;
}

$a = [
  1,
  2,
];
if ($test) {
  $var = 1;
}
echo "hi";
