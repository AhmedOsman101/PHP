<?php

require(__DIR__ . "\main.php");

class Admin extends main {
    function login($phone, $password) {
        if ($phone && $password) return true;
        return false;
    }
}
