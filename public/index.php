<?php

use Core\Controller\Controller;

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

define('ROOT', dirname(__DIR__));

define('PATH','http://'.$_SERVER['HTTP_HOST']);

require ROOT . '/app/app.php';
App::load();

$url = explode('/',substr($_SERVER['REQUEST_URI'], 1));

if ($url[0] === 'admin') {
    $control = !empty($url[1]) ? $url[1] : "products";
    $action = !empty($url[2]) ? $url[2] : "index";
    $id = !empty($url[3]) ? $url[3] : null;
    $controller = '\App\Controller\Admin\\'.ucfirst($control).'Controller';
    
}else{
    $control = $url[0] ?: "products";
    $action = !empty($url[1]) ? $url[1] : "index";
    $id = !empty($url[2]) ? $url[2] : null;
    $controller = '\App\Controller\\'.ucfirst($control).'Controller';
}



$controller = new $controller();
$controller->$action($id);
//method_exists($controller,$action) ? $controller->$action($id) : \core\Controller\Controller::notFound();



