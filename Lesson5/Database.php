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

        if ($this->mysql->connect_error)
            die("an error occurred" . $this->mysql->connect_error);
    }

    public function getConnection() {
        return $this->mysql;
    }

    public function getData($table, $id = NULL) {
        try {
            $sql = $id === null ?
                "SELECT * FROM `$table`" : "SELECT * FROM `$table` WHERE id=$id";
            $response = $this->getConnection()->query($sql);
            $userData = $response->fetch_all(MYSQLI_ASSOC);
            // var_export($userData);
            return $userData;
        } catch (\Throwable $e) {
            return ("An error occurred: " . $e->getMessage());
        }
    }
    public function insertData($table, $data) {
        try {
            $sql = "INSERT INTO `$table`(`name`, `price`, `description`) 
                VALUES ( '{$data["name"]}' , {$data["price"]} , '{$data["description"]}' )";
            $this->getConnection()->query($sql);
            return true;
        } catch (\Throwable $e) {
            return ("An error occurred: " . $e->getMessage());
        }
    }
    public function insertFormData(array $data) {
        try {
            foreach ($data as $key => $value) $$key = $value;
            $sql = "INSERT INTO `products`(`name`, `price`, `description`) 
                    VALUES ( '{$name}' , '{$price}' , '{$description}' )";
            $this->getConnection()->query($sql);
            return true;
        } catch (\Throwable $e) {
            echo ("An error occurred: " . $e->getMessage());
        }
    }
    public function deleteData($id) {
        try {
            $sql = "DELETE FROM `products` WHERE `id` = $id";
            $this->getConnection()->query($sql);
            return true;
        } catch (\Throwable $e) {
            echo ("An error occurred: " . $e->getMessage());
        }
    }
    public function updateData($id, array $data) {
        try {
            foreach ($data as $key => $value) $$key = $value;
            $sql = " UPDATE `products` 
            SET `name`='{$name}',`price`='{$price}',`description`='{$description}' 
            WHERE `id` = $id";
            $this->getConnection()->query($sql);
            return true;
        } catch (\Throwable $e) {
            echo ("An error occurred: " . $e->getMessage());
        }
    }
}
