<?php
function endsWith($str, $ending) {
    // (substr($str, -strlen($ending)) == $ending or $ending == "") ? true : false;
    return str_ends_with($str, $ending);
}

var_export(endsWith("hello world", "world"));
