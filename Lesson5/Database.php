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
        try {
            $this->mysql = new mysqli(
                hostname: $this->db_host,
                username: $this->db_user,
                password: $this->db_password,
                database: $this->db_name
            );

            if ($this->mysql->connect_error) {
                throw new Error("Connection failed: " . $this->mysql->connect_error);
            }
        } catch (\Throwable $e) {
            throw new Error("An error occurred: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->mysql;
    }

    public function getData($table, $id = NULL) {
        try {
            if ($id === null) {
                $sql = "SELECT * FROM `$table`";
                $stmt = $this->getConnection()->prepare($sql);
            } else {
                $sql = "SELECT * FROM `$table` WHERE id=?";
                $stmt = $this->getConnection()->prepare($sql);
                $stmt->bind_param("i", $id);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            $userData = $result->fetch_all(MYSQLI_ASSOC);
            return $userData;
        } catch (\Throwable $e) {
            throw new Error("An error occurred: " . $e->getMessage());
        }
    }

    public function insertData($table, $data) {
        try {
            $sql = "INSERT INTO `$table`(`name`, `price`, `description`) VALUES (?, ?, ?)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bind_param("sis", $data["name"], $data["price"], $data["description"]);
            $stmt->execute();
            return;
        } catch (\Throwable $e) {
            throw new Error("An error occurred: " . $e->getMessage());
        }
    }
    public function deleteData($id) {
        try {
            $sql = "DELETE FROM `products` WHERE `id` = $id";
            // $this->getConnection()->query($sql);
            $this->getConnection()->execute_query($sql); // php 8.2 and above
            return true;
        } catch (\Throwable $e) {
            throw new Error("An error occurred: " . $e->getMessage());
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
            throw new Error("An error occurred: " . $e->getMessage());
        }
    }
}
