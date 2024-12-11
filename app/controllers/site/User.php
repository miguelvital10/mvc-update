<?php

namespace app\controllers\site;

use app\models\activerecord\FindBy;
use app\models\User as UserModel;
use Exception;

class User
{
    public array $data = [];
    public $view;
    public $master;

    public function show(array $args)
    {
        $user = (new UserModel)->execute(new FindBy(field:'id',value:$args[0], fields:'id,firstName,lastName'));

        if (!$user) {
            throw new Exception('Usuário não encontrado');
        }

        $this->data = [
            'title' => 'Dados do Usuário',
            'user'  => $user,
        ];
        $this->view = 'user.php';
        $this->master = 'index.php';
    }
}