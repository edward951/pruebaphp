<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/EmployeeModel.php';

class EmployeeController extends Controller {
    private $employeeModel;

    public function __construct()
    {
        $this->employeeModel = $this->model('EmployeeModel');
    }
    
    public function index() {
        $employees = $this->employeeModel->getAllEmployees(); 
        $this->view('employee/index', ['employees' => $employees]); 
    }

    public function create(){
        $this->view('employee/crear'); 
    }

    public function creation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'nombre' => isset($_POST['nombre']) ? $_POST['nombre'] : '',
                'edad' => isset($_POST['edad']) ? $_POST['edad'] : '',
                'genero' => isset($_POST['genero']) ? $_POST['genero'] : '',
                'correo' => isset($_POST['correo']) ? $_POST['correo'] : '',
                'cargo' => isset($_POST['cargo']) ? $_POST['cargo'] : '',
                'fecha_creacion' => isset($_POST['fecha_creacion']) ? $_POST['fecha_creacion'] : ''
            ];
        
            $this->employeeModel->createEmployees($data);
            header('Location: index.php?controllers=EmployeeController&action=index');
        }
    }

    public function edit($id){
        
        $employee = $this->employeeModel->getEmployeeById($id);
        $this->view('employee/editar', ['employee' => $employee]);
    }

    public function update($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'id' => $id,
                'nombre' => $_POST['nombre'],
                'edad' => $_POST['edad'],
                'genero' => $_POST['genero'],
                'correo' => $_POST['correo'],
                'cargo' => $_POST['cargo']
           ];
           var_dump($data);
            $this->employeeModel->updateEmployees($data);
            
            header('Location:index.php?controllers=EmployeeController&action=index');
        }
    }

    public function delete($id){
        $this->employeeModel->deleteEmployee($id);
        
        header('Location:index.php?controllers=EmployeeController&action=index');
    }
}
