<?php

require_once '../config/config.php';

class EmployeeModel {
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function verifyLogin($usuario, $contrasena){
        $contrasenaHash = hash('sha256', $contrasena);

        $query = "SELECT * FROM empleados  WHERE usuario = :usuario AND contrasena = :contrasena";
        $stmt = $this->conn->prepare($query);
        $stmt -> execute([':usuario' => $usuario, ':contrasena' => $contrasenaHash]);
        return $stmt -> fetch();
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

        $usuario = strtolower($data['nombre']) . '.' . strtolower($data['apellido']);
        $contrasenaHash = hash('sha256', $data['contrasena']);

        $query = "INSERT INTO empleados (nombre, apellido, usuario, edad, genero, correo, cargo, fecha_creacion, contrasena) VALUES (:nombre, :apellido, :usuario, :edad, :genero, :correo, :cargo, :fecha_creacion, :contrasena)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':nombre' => $data['nombre'],
            ':apellido' => $data['apellido'],
            ':usuario' => $usuario,
            ':edad' => $data['edad'],
            ':genero' => $data['genero'],
            ':correo' => $data['correo'],
            ':cargo' => $data['cargo'],
            ':fecha_creacion' => $data['fecha_creacion'],
            ':contrasena' => $contrasenaHash
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
