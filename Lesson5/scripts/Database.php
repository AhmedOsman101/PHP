<?php

class Database {
    private $db_host;
    private $db_user;
    private $db_password;
    private $db_name;
    private $mysql;

    public function __construct($db_data) {
        $this->db_host = $db_data['DB_HOST'];
        $this->db_user = $db_data['DB_USERNAME'];
        $this->db_password = $db_data['DB_PASSWORD'];
        $this->db_name = $db_data['DB_NAME'];
        $this->mysql = new mysqli(
            hostname: $this->db_host,
            username: $this->db_user,
            password: $this->db_password,
            database: $this->db_name
        );

        if ($this->mysql->connect_error) die("an error occured" . $this->mysql->connect_error);
    }

    public function getConnection() {
        return $this->mysql;
    }

    public function getData($table) {
        try {
            $sql = "SELECT * FROM `$table`";
            $response = $this->getConnection()->query($sql);
            $userData = $response->fetch_all(MYSQLI_ASSOC);
            // var_export($userData);
            return $userData;
        } catch (mysqli_sql_exception $e) {
            return ("An error occurred: " . $e->getMessage());
        }
    }
    public function insertData($table, $object) {
        try {
            $sql = "INSERT INTO `$table`(`name`, `price`, `description`) 
                VALUES ( '{$object->getName()}' , '{$object->getPrice()}' , '{$object->getDescription()}' )";
            $this->getConnection()->query($sql);
            return true;
        } catch (mysqli_sql_exception $e) {
            return ("An error occurred: " . $e->getMessage());
        }
    }
}
