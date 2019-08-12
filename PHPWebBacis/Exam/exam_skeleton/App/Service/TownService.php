<?php

namespace App\Service;


use App\Data\TownDTO;
use App\Repository\TownRepositoryInterface;

class TownService implements TownServiceInterface
{
    /**
     * @var TownRepositoryInterface
     */
    private $townRepository;

    public function __construct(TownRepositoryInterface $townRepository)
    {
        $this->townRepository = $townRepository;
    }

    /**
     * @return \Generator|TownDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->townRepository->findAll();
    }

    /**
     * @param int $int
     * @return \Generator|TownDTO
     */
    public function getOne(int $int): TownDTO
    {
        return $this->townRepository->findOne($int);
    }
}