<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/EmployeeModel.php';

class EmployeeController extends Controller {
    private $employeeModel;

    public function __construct() {
        $this->employeeModel = $this->model('EmployeeModel');
    }
    
    public function login() {
        $this->view('employee/login');
    }
    
    public function auntheticate() {

        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        //verificacion de credenciales

        $empleado = $this->model('EmployeeModel')->verifyLogin($usuario, $contrasena);

        if ($empleado) {
            //si son correctas las credenciales
            session_start();
            $_SESSION['id'] = $empleado['id'];
            $_SESSION['usuario'] = $empleado['usuario'];

            header('Location: ?controller=EmployeeController&action=index');
            exit();

        } else {
            //Si las credenciales no son correctas
            $this->view('employee/login',['error'=> 'Usuario o contraseña son incorrectas']);
        }
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: employee/login');
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
                'apellido' => isset($_POST['apellido']) ? $_POST['apellido'] : '',
                'edad' => isset($_POST['edad']) ? $_POST['edad'] : '',
                'genero' => isset($_POST['genero']) ? $_POST['genero'] : '',
                'correo' => isset($_POST['correo']) ? $_POST['correo'] : '',
                'cargo' => isset($_POST['cargo']) ? $_POST['cargo'] : '',
                'fecha_creacion' => isset($_POST['fecha_creacion']) ? $_POST['fecha_creacion'] : '',
                'contrasena' => isset($_POST['contrasena']) ? $_POST['contrasena'] : '',
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
