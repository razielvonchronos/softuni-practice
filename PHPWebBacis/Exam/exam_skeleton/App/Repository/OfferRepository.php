<?php

namespace App\Repository;

use App\Data\EditOfferDTO;
use App\Data\FullOfferDTO;
use App\Data\OfferDTO;
use App\Data\MyOfferDTO;
use App\Data\RoomDTO;
use App\Data\TownDTO;
use App\Service\UserService;
use Core\DataBinder;
use Database\DatabaseInterface;

class OfferRepository implements OfferRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;
    /**
     * @var DatabaseInterface
     */
    private $dataBinder;

    /**
     * OfferRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
        $this->dataBinder = new DataBinder();
    }


    public function add(OfferDTO $offer)
    {
        $this->db->query("INSERT INTO 
        offers (price, days, description, picture_url, room_id, town_id,user_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?)")
            ->execute([$offer->getPrice(), $offer->getDays(), $offer->getDescription(), $offer->getPictureUrl(), $offer->getRoomId(), $offer->getTownId(), $offer->getUserId()]);
    }

    /**
     * @param int $userId
     * @return MyOfferDTO[]\Generator
     */
    public function findByUserId(int $userId): \Generator
    {
        $lazyOfferResult = $this->db->query("
            SELECT 
                o.id,
                o.price,
                o.days,
                o.description,
                o.picture_url,
                r.type as roomType,
                t.name as townName,
                o.is_occupied,
                o.added_on
            FROM offers as o
            JOIN rooms as r on o.room_id = r.id
            JOIN towns as t on o.town_id = t.id
            WHERE o.user_id = ?
            ORDER BY o.added_on DESC
        ")->execute([$userId])->fetchAssoc();

        foreach ($lazyOfferResult as $row) {

            /** @var MyOfferDTO $offer */
            /** @var RoomDTO $room */
            /** @var TownDTO $town */
            $offer = $this->dataBinder->bind($row, MyOfferDTO::class);
            $offer->setPrice($row['price']);
            $offer->setDays($row['days']);
            $offer->setDescription($row['description']);
            $offer->setPictureUrl($row['picture_url']);
            $offer->setRoomType($row['roomType']);
            $offer->setTownName($row['townName']);
            $offer->setIsOccupied($row['is_occupied']);
            $offer->setAddedOn($row['added_on']);

            yield $offer;
        }

    }

    /**
     * @return FullOfferDTO[]|\Generator
     */
    public function findAll(): \Generator
    {
        $lazyOfferResult = $this->db->query(
            "SELECT
                    i.id,
                    i.price,
                    i.days,
                    i.description,
                    i.picture_url,
                    i.room_id,
                    i.town_id,
                    i.user_id,
                    i.is_occupied,
                    i.added_on,
                    r.type as RoomType,
                    t.name as TownName
                   FROM
                    offers i
                    JOIN towns t on i.town_id = t.id
                    JOIN rooms r on i.user_id = r.id
                    ORDER BY i.added_on DESC
            "
        )->execute()->fetchAssoc();

        foreach ($lazyOfferResult as $row) {

            /** @var FullOfferDTO $offer */
            $offer = $this->dataBinder->bind($row, FullOfferDTO::class);
            $offer->setId($row['id']);
            $offer->setPrice($row['price']);
            $offer->setDays($row['days']);
            $offer->setDescription($row['description']);
            $offer->setPictureUrl($row['picture_url']);
            $offer->setRoomId($row['room_id']);
            $offer->setTownId($row['town_id']);
            $offer->setUserId($row['user_id']);
            $offer->setIsOccupied($row['is_occupied']);
            $offer->setAddedOn($row['added_on']);
            $offer->setRoom($row['RoomType']);
            $offer->setTown($row['TownName']);

            yield $offer;
        }
    }

    public function edit(EditOfferDTO $offer)
    {
        $this->db->query(
            "UPDATE offers SET
            price = ?,
            days = ?,
            description = ?,
            picture_url = ?,
            room_id = ?,
            town_id = ?,
            is_occupied = ?
            WHERE id = ?"
        )->execute([
            $offer->getPrice(),
            $offer->getDays(),
            $offer->getDescription(),
            $offer->getPictureUrl(),
            $offer->getRoomId(),
            $offer->getTownId(),
            $offer->getIsOccupied(),
            $offer->getId()
        ]);
    }

    public function findOne(int $id): FullOfferDTO
    {
        $lazyOfferResult = $this->db->query(
            "SELECT
                    o.id,
                    o.price,
                    o.days,
                    o.description,
                    o.picture_url,
                    o.room_id,
                    o.town_id,
                    o.user_id,
                    o.is_occupied,
                    o.added_on,
                    r.type as RoomType,
                    t.name as TownName
                    FROM offers as o
                    JOIN towns t on o.town_id = t.id
                    JOIN rooms r on o.user_id = r.id
                    WHERE o.id = ?"
        )->execute([$id])
            ->fetchAssoc();


        foreach ($lazyOfferResult as $row) {

            $user = new UserRepository($this->db, $this->dataBinder);
            /** @var FullOfferDTO $offer */
            $offer = new FullOfferDTO();
            $offer->setPrice($row['price']);
            $offer->setDays($row['days']);
            $offer->setDescription($row['description']);
            $offer->setPictureUrl($row['picture_url']);
            $offer->setRoomId($row['room_id']);
            $offer->setTownId($row['town_id']);
            $offer->setUserId($row['user_id']);
            $offer->setIsOccupied($row['is_occupied']);
            $offer->setAddedOn($row['added_on']);
            $offer->setRoom($row['RoomType']);
            $offer->setTown($row['TownName']);


            $user = $user->findOneById($row['user_id']);
            $offer->setUser($user);

            return $offer;
        }
    }

    public function delete(int $id)
    {
        $this->db->query("DELETE FROM offers WHERE id = ?")->execute([$id]);
    }
}