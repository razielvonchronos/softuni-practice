<?php

use App\Repository\UserRepository;

spl_autoload_register(function ($class) {
    include_once $class . '.php';
});

//$params = explode('/', $_GET['url_data']);
//$controllerName = array_shift($params);
//$actionName = array_shift($params);


$user = new UserRepository();

$userDTO = $user->findOne(1);
var_dump($userDTO);