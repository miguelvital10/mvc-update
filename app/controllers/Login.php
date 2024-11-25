<?php

namespace app\controllers;

use app\models\User;
use app\classes\Flash;
use app\models\activerecord\FindBy;

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

       $user = new User;
       $userFound = $user->execute(new FindBy(field:'email', value:$email, fields:'firstName,lastName,password'));

       if (!$userFound) {
           Flash::set('login','Usuário ou senha inválidos');

           return redirect('/login');
       }

       $passwordMatch = password_verify($password, $userFound->password);

       if (!$passwordMatch) {
            Flash::set('login','Usuário ou senha inválidos');
            return redirect('/login');
       }

       $_SESSION['user'] = $userFound;

       return redirect('/');
    }
}