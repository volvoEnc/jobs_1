<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$GLOBALS['db'] = new PDO('mysql:host=localhost;dbname=jobs_1', 'danil', 'Xnrhttp');
$GLOBALS['db']->exec("set names utf8");

require 'vendor/autoload.php';
session_start();
unset_h(); // Сброс ссессии back

$router = new Router();
[$controller, $method] = $router->find();
$app = new $controller();
$app->$method();

unset_f(); // Сброс ссессий с alert и error
?>
