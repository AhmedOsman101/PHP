<?php

function findMedian($arr) {
    sort($arr);
    return $arr[sizeOf($arr) / 2];
}

var_export(findMedian([5, 4, 3, 2, 1]));