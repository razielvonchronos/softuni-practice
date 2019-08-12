<?php

namespace App\Data;


class OfferDTO
{
    private const PRICE_MIN = 1;
    private const PRICE_MAX = 50;

    private const DESCRIPTION_MIN_LENGTH = 10;
    private const DESCRIPTION_MAX_LENGTH = 10000;

    private const PICTURE_URL_MIN_LENGTH = 10;
    private const PICTURE_URL_MAX_LENGTH = 10000;

    private $id;
    private $price;
    private $days;
    private $description;
    private $picture_url;
    private $roomId;
    private $townId;
    private $userId;
    private $isOccupied;
    private $AddedOn;

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
     * @param $price
     * @return OfferDTO
     * @throws \Exception
     */
    public function setPrice(float $price): OfferDTO
    {
        DTOValidator::validate(self::PRICE_MIN, self::PRICE_MAX,
            $price, "number", "Price");

        $this->price = $price;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return OfferDTO
     * @throws \Exception
     */
    public function setDescription($description): OfferDTO
    {
        DTOValidator::validate(self::DESCRIPTION_MIN_LENGTH, self::DESCRIPTION_MAX_LENGTH,
            $description, "text", "Description");

        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPictureUrl()
    {
        return $this->picture_url;
    }

    /**
     * @param $picture_url
     * @return OfferDTO
     * @throws \Exception
     */
    public function setPictureUrl($picture_url): OfferDTO
    {

        DTOValidator::validate(self::PICTURE_URL_MIN_LENGTH, self::PICTURE_URL_MAX_LENGTH,
            $picture_url, "text", "PictureUrl");

        $this->picture_url = $picture_url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * @param mixed $roomId
     */
    public function setRoomId($roomId): void
    {
        $this->roomId = $roomId;
    }

    /**
     * @return mixed
     */
    public function getTownId()
    {
        return $this->townId;
    }

    /**
     * @param mixed $townId
     */
    public function setTownId($townId): void
    {
        $this->townId = $townId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
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
    public function getIsOccupied()
    {
        return $this->isOccupied;
    }

    /**
     * @param mixed $isOccupied
     */
    public function setIsOccupied($isOccupied): void
    {
        $this->isOccupied = $isOccupied == 1 ? true : false;
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