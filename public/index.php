<?php
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

define('ROOT', dirname(__DIR__));

define('PATH','http://'.$_SERVER['HTTP_HOST']);

require ROOT . '/app/app.php';
App::load();

$url = explode('/',substr($_SERVER['REQUEST_URI'], 1));

$control = $url[0] ?: "products";
$action = !empty($url[1]) ? $url[1] : "index";
$id = !empty($url[2]) ? $url[2] : null;


$controller = '\App\Controller\\'.ucfirst($control).'Controller';
$controller = new $controller();
$controller->$action($id);

