<?php

class Conexion {
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $conn;

    public function __construct() {
        $config = require __DIR__ . '/../../config/config.php';
        $this->host = $config['db_host'];
        $this->db_name = $config['db_name'];
        $this->username = $config['db_user'];
        $this->password = $config['db_pass'];
    }

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
