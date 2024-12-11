<?php

namespace app\controllers\site;

use app\classes\BlockAccess;
use app\classes\BlockNotLogged;
use app\models\User;
use app\classes\Flash;
use app\core\MethodExtract;
use app\interfaces\ControllerInterface;
use app\models\activerecord\FindBy;

class Login implements ControllerInterface
{
    public array $data = [];
    public string $view;
    public string $master;

    public function __construct()
    {
      
    }

    public function index(array $args)
    {
        $this->data = [
            'title' => 'Login'
        ];
        $this->view = 'Login.php';
        $this->master = 'index.php';
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

    public function destroy(array $args){
        unset($_SESSION['user']);
        
        return redirect('/');
    }

    public function edit(array $args){

    }

    public function update(array $args){

    }

    public function show(array $args){

    }
}