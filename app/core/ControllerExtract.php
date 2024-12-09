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

        if (isset($uri[0]) and $uri[0] !== '') {
            $controller = ucfirst($uri[0]);
        }

        $namespaceAndController = "app\\controllers\\" . $controller;

        if (class_exists($namespaceAndController)) {
            $controller = $namespaceAndController;
        }

        return $controller;
    } 
}