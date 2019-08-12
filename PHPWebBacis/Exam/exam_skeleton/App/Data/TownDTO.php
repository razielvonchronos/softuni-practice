<?php

namespace App\Data;


class TownDTO
{
    private $id;
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return TownDTO
     */
    public function setId($id): TownDTO
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return TownDTO
     */
    public function setName($name): TownDTO
    {
        $this->name = $name;

        return $this;
    }



}