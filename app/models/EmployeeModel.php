<?php

use LDAP\Result;

require_once '../config/config.php';

class EmployeeModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function verifyLogin($usuario, $contrasena)
    {
        $query = "SELECT * FROM empleados  WHERE usuario = :usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':usuario' => $usuario]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($contrasena, $result['contrasena'])) {

            return  $result;
        }
       return false;
    }

    public function getAllEmployees()
    {
        $query = "SELECT * FROM empleados";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployeeById($id)
    {
        $query = "SELECT * FROM empleados WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEmployees($data)
    {
        $usuario = strtolower($data['nombre']) . '.' . strtolower($data['apellido']);
        $contrasenaHash = password_hash($data['contrasena'], PASSWORD_DEFAULT);

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

    public function updateEmployees($data)
    {
        $query = "UPDATE empleados SET nombre = :nombre, edad = :edad, genero = :genero, correo = :correo, cargo = :cargo, estado = :estado WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':nombre' => $data['nombre'],
            ':edad' => $data['edad'],
            ':genero' => $data['genero'],
            ':correo' => $data['correo'],
            ':cargo' => $data['cargo'],
            ':id' => $data['id'],
            ':estado'=>$data['estado']
        ]);
    }

    public function deleteEmployee($id)
    {
        $query = "DELETE FROM empleados WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getStateEmployee($estado) {
        $query = "SELECT * FROM empleados WHERE estado = :estado";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':estado', $estado);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStateEmployee($id, $estado) {
        $query = "UPDATE empleados SET estado = :estado WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':estado', $estado);
        return $stmt->execute();
    }
}
