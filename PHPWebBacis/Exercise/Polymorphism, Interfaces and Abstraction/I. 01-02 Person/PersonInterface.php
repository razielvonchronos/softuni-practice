<?php

/**
 * Interface PersonInterface
 */
interface PersonInterface extends BirthableInterface, IdentifiableInterface
{

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @param int $age
     */
    public function setAge(int $age);
}