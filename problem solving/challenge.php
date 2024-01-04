<?php

function challenge($s) {
    @$res = explode($s[(strlen($s) / 2)], $s);
    if ($res[0] == strrev($res[1])) return "true";
    else return "false";
}
