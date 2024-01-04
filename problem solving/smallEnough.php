<?php
function smallEnough($a, $limit) {
    foreach ($a as $n) {
        if ($limit < $n) return false;
    }
