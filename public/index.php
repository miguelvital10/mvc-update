<?php

session_start();
require '../vendor/autoload.php';

use app\models\User;
use app\models\activerecord\FindAll;


$user = new User;
$users = $user->execute(new FindAll(fields:'id,firstName,lastName'));

var_dump($users);
