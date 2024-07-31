<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/EmployeeModel.php';

class EmployeeController extends Controller {
    private $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }
    
    public function index() {
        
        $employees = $this->employeeModel->getEmplooyees();
        $this->view('employees/index', ['employees' => $employees]);
    }

    public function create(){
        $this->view('employee/crear');
    }

    public function creation(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $genero = $_POST['genero'];
            $correo = $_POST['correo'];
            $cargo = $_POST['cargo'];
            $fechaCreacion = $_POST['fecha_creacion'];

            $this->employeeModel->createEmployees($nombre, $edad, $genero, $correo, $cargo, $fechaCreacion);
            header('Location: employee/index');
            exit;
        }
    }

    public function edit($id){
        $employeeModel = $this->model('EmployeeModel');
        $employee = $employeeModel->getEmployeeById($id);
        $this->view('employee/editar', ['employee' => $employee]);
    }

    public function update($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $genero = $_POST['genero'];
            $correo = $_POST['correo'];
            $cargo = $_POST['cargo'];
        
        $this->employeeModel->updateEmployees($id,$nombre,$edad,$genero,$correo,$cargo);
        header('Location:/employee/index');
        }
    }

    public function delete($id){
        $employeeModel = $this->model('EmployeeModel');
        $employeeModel->deleteEmployees($id);
        header('Location:/employee/index');
    }
}
