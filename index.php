<?php

require __DIR__ . '/App/autoload.php';

$string = $_SERVER['REQUEST_URI'];
list (,$controllerName, $actionName, $params) = explode('/',$string);
$controllerName = '\App\Controllers\\'.ucfirst($controllerName);
$actionName = 'action'.ucfirst($actionName);
if ($controllerName != null && $actionName !='action') {
    if (class_exists($controllerName) && in_array($actionName, get_class_methods($controllerName))) {
        $ctrl = new $controllerName();
        $ctrl->$actionName($params);
    }
    } else {
    $ctrl = new \App\Controllers\Post();
    $ctrl->actionIndex();
}



