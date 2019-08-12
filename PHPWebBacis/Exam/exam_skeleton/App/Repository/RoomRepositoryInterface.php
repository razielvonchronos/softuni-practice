<?php

namespace App\Repository;


use App\Data\RoomDTO;

interface RoomRepositoryInterface
{
    /**
     * @return \Generator|RoomDTO[]
     */
    public function findAll() : \Generator;
}