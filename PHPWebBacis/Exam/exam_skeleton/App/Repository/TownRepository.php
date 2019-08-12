<?php

namespace App\Repository;


use App\Data\TownDTO;
use Database\DatabaseInterface;

class TownRepository implements TownRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * TownRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    /**
     * @return \Generator|TownDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("SELECT id, name FROM towns ORDER BY id")
            ->execute()
            ->fetch(TownDTO::class);
    }

    /**
     * @param int $id
     * @return TownDTO
     */
    public function findOne(int $id): TownDTO
    {
        return $this->db->query("SELECT id, name FROM towns WHERE id = ?")
            ->execute([$id])
            ->fetchOne(TownDTO::class);
    }
}