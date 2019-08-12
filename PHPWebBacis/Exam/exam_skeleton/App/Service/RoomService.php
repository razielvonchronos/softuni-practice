<?php

namespace App\Service;


use App\Data\RoomDTO;
use App\Repository\RoomRepositoryInterface;

class RoomService implements RoomServiceInterface
{
    /**
     * @var RoomRepositoryInterface
     */
    private $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }


    /**
     * @return \Generator|RoomDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->roomRepository->findAll();
    }
}