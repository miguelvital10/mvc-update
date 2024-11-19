<?php

namespace app\controllers;

ini_set('memory_limit', '2048M');

class Home
{

    public array $data = [];
    public string $view;

    public function index(array $args)
    {

        $this->view = 'home.php';
        $this->data = [
            'title' => 'Home'
        ];
    }
}
