<?php

namespace app\core;

class ControllerExtract
{
    public static function extract(){
        $uri = Uri::uri();
        $folder = FolderExtract::extract();

        if ($folder) {
            $controller = Uri::uriExist($uri, 1);
            $namespaceAndController = "app\\controllers\\".$folder."\\";
        } else {
            $controller = Uri::uriExist($uri, 0);
            $namespaceAndController = "app\\controllers\\";
        }

        if (!$controller) {
            $controller = CONTROLLER_DEFAULT;
        }

        $controller = $namespaceAndController.$controller;

        if (class_exists($controller)) {
            return $controller;
        }

        throw new \Exception("Controller {$controller} não existe");
    } 
}