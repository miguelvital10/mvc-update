<?php

namespace app\controllers;  

class Login
{
    public string $view;
    public array $data = [];

    public function index()
    {
        $this->view = 'Login.php';
        $this->data = [
            'title' => 'Login'
        ];
    }

    public function store()
    {
       $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
       $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

       var_dump($email);
       die();
    }
}