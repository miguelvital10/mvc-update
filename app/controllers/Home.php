<?php

namespace app\controllers;

class Home {

    public array $data = [];
    public string $view;

    public function index(array $args){

        $this->view = 'home.php';
        $this->data = [
            'name' => 'Alexandre'
        ];
    }
}