<?php

require(__DIR__ . "\main.php");



class Customer extends main {
    public $name;
    public $email;
    private $password;
    private $password_hash;
    public function __construct($name, $password, $email) {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->password_hash = password_hash($this->password, PASSWORD_DEFAULT);
    }
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function getPasswordHash() {
        return $this->password_hash;
    }
    public function setPasswordHash($password) {
        $this->password_hash = password_hash($password, PASSWORD_DEFAULT);
    }
    function login($email, $password) {
        if ($email && $password) return true;
        return false;
    }
}
