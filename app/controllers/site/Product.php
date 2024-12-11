<?php

namespace app\controllers\site;

use app\interfaces\ControllerInterface;

class Product implements ControllerInterface{
    
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

    public function show(array $args){

    }

    public function update(array $args)
    {
        
    }

    public function store(){

    }
    
    public function destroy(array $args){

    }
}