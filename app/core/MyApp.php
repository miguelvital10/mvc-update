<?php

namespace app\core;

use app\interfaces\ControllerInterface;

class MyApp
{
    private $controller;

    public function __construct(private ControllerInterface $controllerInterface) 
    {

    }

    public function controller()
    {
        $controllerInterface = new AppExtract;
        $controller = $controllerInterface->controller();
        $method = $controllerInterface->method();
        $params = $controllerInterface->params();         

        $this->controller = new $controller; 
        $this->controller->$method($params);
    }

    public function view()
    {

    }
}
