<?php

require_once '../config/config.php';

class EmployeeModel {
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllEmployees(){
        $query = "SELECT * FROM empleados";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployeeById($id) {
        $query = "SELECT * FROM empleados WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEmployees($data){
        $query = "INSERT INTO empleados (nombre, edad, genero, correo, cargo, fecha_creacion) VALUES (:nombre, :edad, :genero, :correo, :cargo, :fecha_creacion)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':nombre' => $data['nombre'],
            ':edad' => $data['edad'],
            ':genero' => $data['genero'],
            ':correo' => $data['correo'],
            ':cargo' => $data['cargo'],
            ':fecha_creacion' => $data['fecha_creacion']
        ]);
    }

    public function updateEmployees($data){
        $query = "UPDATE empleados SET nombre = :nombre, edad = :edad, genero = :genero, correo = :correo, cargo = :cargo WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':nombre' => $data['nombre'],
            ':edad' => $data['edad'],
            ':genero' => $data['genero'],
            ':correo' => $data['correo'],
            ':cargo' => $data['cargo'],
            ':id' => $data['id']
        ]);
    }

    public function deleteEmployee($id){
        $query = "DELETE FROM empleados WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
