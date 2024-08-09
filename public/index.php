<?php

require_once '../app/controllers/EmployeeController.php';

$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'EmployeeController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if ($id) {
        $controller->$action($id);
    } else {
        $controller->$action();
    }
} else {
    echo "Controller class $controllerName not found.";
}
?>
