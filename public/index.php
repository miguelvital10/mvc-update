<?php

use app\core\AppExtract;

session_start();

require '../vendor/autoload.php';

$app = new AppExtract;
$controller = $app->controller();
$method = $app->method();
$params = $app->params();

$controller = new $controller;
$controller->$method($params);