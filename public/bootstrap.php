<?php

ini_set('memory_limit', '2048M');


use app\core\AppExtract;
use app\core\MyApp;

require '../vendor/autoload.php';
require 'bootstrap.php';

$whoops = new \Whoops\Run;
$whoops->allowQuit(false);
$whoops->writeToOutput(false);
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$html = $whoops->handleException($e);

$myApp = new MyApp(new AppExtract);
$myApp->controller();
$myApp->view();