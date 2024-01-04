<?php
function generateHashtag($str) {
    if (empty($str)) return false;
    $res = "";
    foreach (explode(" ", trim($str)) as $word) {
        if (!empty($word)) $res .= ucfirst($word);
    }
