<?php

namespace app\controllers\site;

class Product{
    
    public array $data = [];
    public string $view;

    public function index(array $args)
    {
        $this->view = 'edit.php';
        $this->data = [
            'title' => 'edit',
        ];  
    }

    public function edit(array $args) 
    {
        $this->view = 'edit.php';
        $this->data = [
            'title' => 'edit',
        ];  
    }
}