<?php


namespace Controllers;

use App\Data\UserDTO;

class User
{
    public function findOne(\PDO $pdo) :UserDTO
    {
        $userRepository = new UserRepository($pdo);

    }

}