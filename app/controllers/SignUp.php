<?php

namespace app\controllers;

class SignUp
{
    public string $view;
    public array $data;

    public function index(){
        $this->view = 'signup.php';
        $this->data = [
            'title' => 'SignUp'
        ];
    }

    public function store(){
        $validate = new Validate();
        $validate->handle([
            'firstName' => ['REQUIRED'],
            'lastName'  => ['REQUIRED'],
            'email'     => ['REQUIRED','EMAIL'],
            'password'  => ['REQUIRED',"MAXLEN.':10'"],
        ]);

        if ($validate->erros) {

        }

        //cadastro
    }
}