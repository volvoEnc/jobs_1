<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require 'vendor/autoload.php';
$router = new Router();

/*
* Если путь найден, то возвращается контноллер
* Иначе, возвращается NotFoundContoller
*/

[$controller, $method] = $router->find();

$app = new $controller();
return $app->$method();

 ?>
