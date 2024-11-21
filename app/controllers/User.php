<?php

namespace app\controllers;

class User
{
    public $view;
    public array $data = [];

    public function show($args)
    {
        $this->view = 'user.php';
        $this->data = [
            'title' => 'Dados do Usuário',
        ];
    }
}