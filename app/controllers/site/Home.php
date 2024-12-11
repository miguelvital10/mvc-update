<?php

namespace app\controllers\site;

use app\models\activerecord\FindAll;
use app\models\User;

ini_set('memory_limit', '2048M');

class Home
{

    public array $data = [];
    public string $view;
    public string $master;

    public function index(array $args)
    {
        $users = (new User)->execute(new FindAll(fields:'id,firstName,lastName'));

        $this->data = [
            'title' => 'Home',
            'users' => $users,
        ];
        $this->view = 'home.php';
        $this->master = 'index.php';
    }
}
