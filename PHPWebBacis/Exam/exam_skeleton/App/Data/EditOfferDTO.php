<?php

namespace App\Data;


class EditOfferDTO extends OfferDTO
{
    private $rooms;
    private $towns;

    /**
     * @return RoomDTO[]|\Generator
     */
    public function getRooms(): \Generator
    {
        return $this->rooms;
    }

    public function setRooms($rooms): void
    {
        $this->rooms = $rooms;
    }

    /**
     * @return TownDTO[]|\Generator
     */
    public function getTowns(): \Generator
    {
        return $this->towns;
    }

    public function setTowns($towns): void
    {
        $this->towns = $towns;
    }


}