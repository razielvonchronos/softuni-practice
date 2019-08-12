<?php

namespace App\Repository;


use App\Data\RoomDTO;
use Database\DatabaseInterface;

class RoomRepository implements RoomRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * RoomRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    /**
     * @return \Generator|RoomDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("SELECT id, type FROM rooms ORDER BY id")
            ->execute()
            ->fetch(RoomDTO::class);
    }
}