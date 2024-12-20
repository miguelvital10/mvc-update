<?php

namespace app\controllers\site;

use app\classes\Validate;
use app\models\activerecord\Insert;
use app\classes\Flash;
use app\models\User;
use app\models\Users;

class SignUp
{
    public array $data;
    public string $view;
    public array $master;

    public function index(){
        $this->data = [
            'title' => 'signup',
        ];  
        $this->view = 'signup.php';
        $this->master = 'index.php';
    }

    public function store(){
        $validate = new Validate();
        $validate->handle([
            'firstName' => [REQUIRED],
            'lastName'  => [REQUIRED],
            'email'     => [REQUIRED,EMAIL],
            'password'  => [REQUIRED,MAXLEN.':10'],
        ]); 
        
        if ($validate->errors) {
            return redirect('/signup');
        }

        $user = new User;
        $user->firstName = $validate->data['firstName'];
        $user->lastName = $validate->data['lastName'];
        $user->email = $validate->data['email'];
        $user->password = password_hash($validate->data['password'], PASSWORD_DEFAULT);
        
        $created = $user->execute(new Insert);

        if ($created) {
            Flash::set('created', 'Cadastrado com sucesso', 'success');
            return redirect('/');
        } 
    }
}