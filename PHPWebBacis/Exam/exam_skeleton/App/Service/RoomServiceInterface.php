<?php

namespace App\Service;

use App\Data\RoomDTO;

interface RoomServiceInterface
{

    /**
     * @return \Generator|RoomDTO[]
     */
    public function getAll() : \Generator;
}