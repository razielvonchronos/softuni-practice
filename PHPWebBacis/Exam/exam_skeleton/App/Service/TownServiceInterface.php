<?php

namespace App\Service;

use App\Data\TownDTO;

interface TownServiceInterface
{

    /**
     * @return \Generator|TownDTO[]
     */
    public function getAll() : \Generator;
}