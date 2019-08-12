<?php

namespace App\Data;


class RoomDTO
{
    private $id;
    private $type;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return RoomDTO
     */
    public function setId($id): RoomDTO
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return RoomDTO
     */
    public function setType($type): RoomDTO
    {
        $this->type = $type;

        return $this;
    }



}