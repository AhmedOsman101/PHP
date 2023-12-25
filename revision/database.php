<?php

class Database {
    private $DB_NAME;
    private $DB_HOST;
    private $DB_PASSWORD;
    private $DB_USER;
    public $CONNECTION;
    public function __construct($host, $user, $name, $password) {
        $this->DB_HOST = $host;
        $this->DB_USER = $user;
        $this->DB_NAME = $name;
        $this->DB_PASSWORD = $password;
        try {
            $this->CONNECTION = new mysqli(
                $hostname = $this->DB_HOST,
                $username = $this->DB_USER,
                $password = $this->DB_PASSWORD,
                $database = $this->DB_NAME,
            );
            if ($this->CONNECTION->connect_error) {
                header('HTTP/1.1 500 ERROR', true, 500);
                return json_encode([
                    "Status" => 500,
                    "ERROR" => "Connection failed: " . $this->mysql->connect_error
                ], JSON_PRETTY_PRINT);
            }
        } catch (Throwable $e) {
            header('HTTP/1.1 500 ERROR', true, 500);
            return json_encode([
                "ERROR" => "An Error Occurred: " . $e->getMessage()
            ], JSON_PRETTY_PRINT);
        }
    }
    public function getConnection() {
        return $this->CONNECTION;
    }
    public function View($table, $id = NULL) {
        try {
            $sql = "SELECT * FROM `$table`";
            if ($id !== NULL) {
                $sql .= " WHERE id=?";
                $stmt = $this->getConnection()->prepare($sql);
                $stmt->bind_param("i", $id);
            } else $stmt = $this->getConnection()->prepare($sql);

            $stmt->execute();
            $response = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            if (empty($response)) {
                header('HTTP/1.1 404 NOT FOUND', true, 404);
                return json_encode([
                    "Status" => 404,
                    "ERROR" => "No Data Was Found"
                ], JSON_PRETTY_PRINT);
            } else {
                header('HTTP/1.1 200 OK', true, 200);
                return json_encode([
                    "Message" => "Data Was Found",
                    "Data" => $response
                ], JSON_PRETTY_PRINT);
            }
        } catch (Throwable $e) {
            header('HTTP/1.1 500 ERROR', true, 500);
            return json_encode([
                "ERROR" => "An Error Occurred: " . $e->getMessage()
            ], JSON_PRETTY_PRINT);
        }
    }
    public function Add($table, $data) {
        try {
            $sql = "INSERT INTO `$table`(`name`, `price`, `description`) 
                    VALUES (?,?,?)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bind_param('sis', $data['name'], $data['price'], $data['description']);
            $stmt->execute();
            header('HTTP/1.1 200 OK', true, 200);
            return json_encode([
                "Message" => "User Added Successfully"
            ], JSON_PRETTY_PRINT);
        } catch (Throwable $e) {
            header('HTTP/1.1 500 ERROR', true, 500);
            return json_encode([
                "ERROR" => "An Error Occurred: " . $e->getMessage()
            ], JSON_PRETTY_PRINT);
        }
    }
    public function Update($table, $id, $data) {
        try {
            $sql = "UPDATE $table SET `name`=?,`price`=?,`description`=? WHERE `id`=?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bind_param('sisi', $data['name'], $data['price'], $data['description'], $id);
            $stmt->execute();
            if ($this->getConnection()->affected_rows > 0) {
                header('HTTP/1.1 200 OK', true, 200);
                return json_encode([
                    "Message" => "User Updated Successfully"
                ], JSON_PRETTY_PRINT);
            } else {
                header('HTTP/1.1 404 NOT FOUND', true, 404);
                return json_encode([
                    "Status" => 404,
                    "ERROR" => "No Data Was Found"
                ], JSON_PRETTY_PRINT);
            }
        } catch (Throwable $e) {
            header('HTTP/1.1 500 ERROR', true, 500);
            return json_encode([
                "ERROR" => "An Error Occurred: " . $e->getMessage()
            ], JSON_PRETTY_PRINT);
        }
    }
    public function Delete($table, $id) {
        try {
            $sql = "DELETE FROM `$table` WHERE `id`= ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            if ($this->getConnection()->affected_rows > 0) {
                header('HTTP/1.1 200 OK', true, 200);
                return json_encode([
                    "Message" => "User Deleted Successfully"
                ], JSON_PRETTY_PRINT);
            } else {
                header('HTTP/1.1 404 NOT FOUND', true, 404);
                return json_encode([
                    "Status" => 404,
                    "ERROR" => "No Data Was Found"
                ], JSON_PRETTY_PRINT);
            }
        } catch (Throwable $e) {
            header('HTTP/1.1 500 ERROR', true, 500);
            return json_encode([
                "ERROR" => "An Error Occurred: " . $e->getMessage()
            ], JSON_PRETTY_PRINT);
        }
    }
}
