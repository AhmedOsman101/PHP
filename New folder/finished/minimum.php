function mini($arr) {
    $max = 0;
    foreach ($arr as $item) if ($item < $max) $max = $item;
    return $max;
}
