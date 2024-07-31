<?php

require_once 'Conexion.php';

class Model {
    protected $db;

    public function __construct() {
        $database = new Conexion();
        $this->db = $database->getConnection();
    }
}
