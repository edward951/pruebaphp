<?php
require_once __DIR__ . '/../app/core/Router.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = trim($url, '/');

$router = new Router();
$router->direct($url);


?>
