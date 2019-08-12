<?php

namespace App\Repository;

use App\Data\UserDTO;
use Database\MySQLQueryBuilder;


class UserRepository
{
    public function findAll()
    {

    }

    public function findOne(int $id): UserDTO
    {
        $builder = new MySQLQueryBuilder();
        $r = $builder->select()->
        from('users')->
        where(['id' => $id])->
        orderBy()->
        build()->
        prepare()->
        execute()->
        fetch();
        return new UserDTO($r['id'], $r['username'], $r['password'], $r['full_name'], $r['location'], $r['phone']);
    }
}