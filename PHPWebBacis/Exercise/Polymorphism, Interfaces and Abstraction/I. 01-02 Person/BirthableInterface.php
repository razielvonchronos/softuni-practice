<?php

/**
 * Interface BirthableInterface
 */
interface BirthableInterface
{
    /**
     * @param string $date
     */
    public function setBirthDate(string $date);

    /**
     * @param int $id
     * @param string $birthDate
     */
    public function setIdBirthDate(int $id, string $birthDate);
}