<?php

namespace app\controllers\site;

class Product{
    
    public array $data = [];
    public string $view;
    public string $master;

    public function index(array $args)
    {
        $this->data = [
            'title' => 'edit',
        ];  
        $this->view = 'edit.php';
        $this->master = 'index.php';
    }

    public function edit(array $args) 
    {
        $this->view = 'edit.php';
        $this->data = [
            'title' => 'edit',
        ];  
    }
}