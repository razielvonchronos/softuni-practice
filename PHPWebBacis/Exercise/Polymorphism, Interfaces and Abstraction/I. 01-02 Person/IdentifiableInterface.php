<?php

/**
 * Interface IdentifiableInterface
 */
interface IdentifiableInterface
{
    /**
     * @param string $id
     */
    public function setId(string $id);

    /**
     * @param int $id
     * @param string $birthDate
     */
    public function setIdBirthDate(int $id, string $birthDate);
}

