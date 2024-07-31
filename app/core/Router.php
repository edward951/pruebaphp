<?php 

    class Router{
        private $routes = [];

        public function __construct(){
            $this->routes = [
            '/' => ['controller' => 'HomeController', 'action' => 'index'],
            '/employee/index' => ['controller' => 'EmployeeController', 'action' => 'index'],
            '/employee/index' => ['controller' => 'EmployeeController', 'action' => 'create'],
            '/employee/crear' => ['controller' => 'EmployeeController', 'action' => 'creation'],
            '/employee/editar' => ['controller' => 'EmployeeController', 'action' => 'edit'],
            '/employee/index' => ['controller' => 'EmployeeController', 'action' => 'update'],
            '/employee/index' => ['controller' => 'EmployeeController', 'action' => 'delete'],
            ];
        }
        
        public function direct($url){

        $url = trim($url, '/');
        $url = $url ?: '/';
            if(array_key_exists($url,$this->routes)){
                $controllerName = $this->routes[$url]['controller'];
                $actionName = $this->routes[$url]['action'];

                require_once __DIR__ . '/../controllers' . $controllerName . '.php';
                $controller = new $controllerName();

                if(method_exists($controller, $actionName)){
                    $controller->$actionName();
                } else{
                    echo 'metodo no encontrado';
                }
                
            } else{
                echo "Pagina no encontraaada";
            }
        }
    }
?>