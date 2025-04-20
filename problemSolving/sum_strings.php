<?php

declare(strict_types=1);

function sum_strings($n, $m): string {
  [$n, $m] = [strrev($n), strrev($m)];
  $res = "";
  $len = max(strlen($n), strlen($m)) + 1;
  $carry = 0;
  for ($i = 0; $i < $len; $i++) {
    $na = isset($n[$i]) ? (int) $n[$i] : 0;
    $nb = isset($m[$i]) ? (int) $m[$i] : 0;
    $sum = $na + $nb + $carry;
    echo "sum:" . $sum . " carry:" . $carry . PHP_EOL;
    if ($sum == 0) {
      $res .= "0";
      continue;
    } elseif ($sum < 10) {
      $res .= $sum;
      $carry = 0;
    } else {
      $res .= $sum - 10;
      $carry = 1;
    }
  }
  $res = ltrim(strrev($res), "0");
  $res = empty($res) ? "0" : $res;

  return $res;
}

$a = "712569312664357328695151392";
$b = "8100824045303269669937";
$c = sum_strings($a, $b);

var_dump($c);
var_dump($a + $b);
var_dump(($a + $b) == $c);
