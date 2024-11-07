<?php

use app\core\AppExtract;

session_start();

require '../vendor/autoload.php';

$app = new AppExtract;
$app->controller();
$params = $app->params();

$arr = ['product', '12'];

var_dump(array_slice($arr, 1, count($arr)));