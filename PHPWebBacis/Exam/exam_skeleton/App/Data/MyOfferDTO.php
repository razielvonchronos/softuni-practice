<?php

namespace App\Data;


class MyOfferDTO
{
    private $id;
    private $price;
    private $days;
    private $description;
    private $picture_url;
    private $roomType;
    private $townName;
    private $isOccupied;
    private $AddedOn;

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
    public function getRoomType()
    {
        return $this->roomType;
    }

    /**
     * @param mixed $roomType
     */
    public function setRoomType($roomType): void
    {
        $this->roomType = $roomType;
    }

    /**
     * @return mixed
     */
    public function getTownName()
    {
        return $this->townName;
    }

    /**
     * @param mixed $townName
     */
    public function setTownName($townName): void
    {
        $this->townName = $townName;
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

}