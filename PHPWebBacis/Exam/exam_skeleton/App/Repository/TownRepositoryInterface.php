<?php

namespace App\Repository;


use App\Data\TownDTO;

interface TownRepositoryInterface
{
    /**
     * @return \Generator|TownDTO[]
     */
    public function findAll() : \Generator;
    public function findOne(int $id) : TownDTO;

}