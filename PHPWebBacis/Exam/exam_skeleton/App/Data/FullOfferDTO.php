<?php

namespace App\Data;


use App\Repository\TownRepository;
use App\Service\TownService;

class FullOfferDTO
{
    private $id;
    private $price;
    private $days;
    private $description;
    private $picture_url;
    private $room_id;
    private $town_id;
    private $user_id;
    private $isOccupied;
    private $AddedOn;

    private $town;
    private $room;
    private $user;

    /**
     * MyOfferDTO constructor.
     * @param $id
     * @param $price
     * @param $days
     * @param $description
     * @param $picture_url
     * @param $roomType
     * @param $townName
     * @param $isOccupied
     * @param $AddedOn
     */

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     */
    public function setDays($days): void
    {
        $this->days = $days;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPictureUrl()
    {
        return $this->picture_url;
    }

    /**
     * @param mixed $picture_url
     */
    public function setPictureUrl($picture_url): void
    {
        $this->picture_url = $picture_url;
    }

    /**
     * @return mixed
     */
    public function getRoomId()
    {
        return $this->room_id;
    }

    /**
     * @param mixed $room_id
     */
    public function setRoomId($room_id): void
    {
        $this->room_id = $room_id;
    }

    /**
     * @return mixed
     */
    public function getTownId()
    {
        return $this->town_id;
    }

    /**
     * @param mixed $town_id
     */
    public function setTownId($town_id): void
    {
        $this->town_id = $town_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getIsOccupied()
    {
        return $this->isOccupied;
    }

    /**
     * @param mixed $isOccupied
     */
    public function setIsOccupied($isOccupied): void
    {
        $this->isOccupied = $isOccupied;
    }

    /**
     * @return mixed
     */
    public function getAddedOn()
    {
        return $this->AddedOn;
    }

    /**
     * @param mixed $AddedOn
     */
    public function setAddedOn($AddedOn): void
    {
        $this->AddedOn = $AddedOn;
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param mixed $town
     */
    public function setTown($town): void
    {
        $this->town = $town;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room): void
    {
        $this->room = $room;
    }

    public function setUser(?UserDTO $user)
    {
        $this->user = $user;
    }
    public function getUser(): UserDTO
    {
        return $this->user;
    }


}