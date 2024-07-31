<?php

require_once __DIR__ . '/../core/Model.php';

class EmployeeModel extends Model{

    public function getEmplooyees(){

        $stmt = $this->db->prepare('SELECT * FROM empleados' );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmplooyeesById($id) {
        $stmt = $this->db->prepare('SELECT * FROM empleados WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createEmployees($nombre, $edad, $genero, $correo, $cargo, $fechaCreacion){
        $stmt = $this->db->prepare('INSERT INTO empleados (nombre, edad, genero, corre, cargo, fecha_creacion) 
        VALUES (:nombre, :edad, :genero, :corre, :cargo, fechaCreacion)');
        $stmt->bindParam(':nombre',$nombre);
        $stmt->bindParam(':edad',$edad);
        $stmt->bindParam(':genero',$genero);
        $stmt->bindParam(':correo',$correo);
        $stmt->bindParam(':cargo',$cargo);
        $stmt->bindParam(':fecha_creacion',$fechaCreacion);

        return $stmt->execute();
    }

    public function updateEmployees($id, $nombre, $edad, $genero, $correo, $cargo){
        $stmt = $this->db->prepare('UPDATE employees SET nombre=:nombre, edad=:edad, genero=:genero, correo=:corre, cargo=:cargo');
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nombre',$nombre);
        $stmt->bindParam(':edad',$edad);
        $stmt->bindParam(':genero',$genero);
        $stmt->bindParam(':correo',$correo);
        $stmt->bindParam(':cargo',$cargo);
    }

    public function deleteEmployees($id){
        $stmt = $this->db->prepare('DELETE FROM employee WHERE id = :id');
        $stmt ->bindParam(':id',$id);
        return $stmt->execute();
    }




}



?>