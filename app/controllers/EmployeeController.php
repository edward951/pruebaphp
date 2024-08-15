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

            echo 'success';

        } else {
            //Si las credenciales no son correctas
           echo 'error';
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

    public function getEmployeesJson() {
        header('Content-type: application/json');

        try {
            $estado = 1;
            $employee = $this->employeeModel->getStateEmployee($estado);
            echo json_encode($employee);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
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
        
            $empleadoCreado = $this->employeeModel->createEmployees($data);
            if($empleadoCreado === true ) {
                header('Location: index.php?controller=EmployeeController&action=index&success=true');
            } else {
                header('Location: index.php?controller=EmployeeController&action=create&success=false');
            }
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
                'cargo' => $_POST['cargo'],
                'estado'=> $_POST['estado']
           ];
           
            $this->employeeModel->updateEmployees($data);
            
            header('Location:index.php?controllers=EmployeeController&action=index');
        }
    }

    public function delete($id){
        $this->employeeModel->deleteEmployee($id);
        
        header('Location:index.php?controllers=EmployeeController&action=index');
    }

    public function inactivate($id) {
        $estado = 2;
        if($this->employeeModel->updateStateEmployee($id, $estado)) {
            header("Location: index.php?controller=EmployeeController&action=showInactiveEmployees");
            exit();
        } else {
            echo "Error al inactivar al empleado";
        }
    }

    public function inactiveEmployee() {
        $inactiveEmployee = $this->employeeModel->getStateEmployee(2);
        $this->view('employee/inactivos', ['employee' => $inactiveEmployee]);
    }

    public function reactivate($id) {
        $estado = 1;
        if($this->employeeModel->updateStateEmployee($id, $estado)) {
            header('Location:index.php?controllers=EmployeeController&action=index');
            exit();
        } else {
            echo "Error al reactivar al empleado";
        }
    }

    public function showInactiveEmployees(){
        $estado = 2;
        $employees =$this->employeeModel->getStateEmployee($estado);
        $this->view('employee/inactivos',['employees'=> $employees]);
    }

    public function showActiveEmployees(){
        $estado = 1;
        $employees = $this->employeeModel->getStateEmployee($estado);
        $this->view('employee/index',['employees'=> $employees]);
    }

}
