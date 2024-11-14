<?php

namespace app\controllers;

class Product{
    public function index(array $args)
    {
        var_dump($args);
    }

    public function edit(array $args) 
    {
        var_dump($args[1]);
    }
}