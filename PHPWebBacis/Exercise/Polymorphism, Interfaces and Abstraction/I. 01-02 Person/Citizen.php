<?php

/**
 * Class Citizen
 */
class Citizen implements PersonInterface
{
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var int $age
     */
    private $age;

    /**
     * @var string $id
     */
    private $id;

    /**
     * @var string $birthdate
     */
    private $birthdate;

    /**
     * Citizen constructor.
     * @param string $name
     * @param int $age
     * @param string $id
     * @param string $birthdate
     */
    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->birthdate = $birthdate;
    }

    public function __toString()
    {
        return sprintf("%s%s%d%s%s%s%s",
            $this->name,
            PHP_EOL,
            $this->age,
            PHP_EOL,
            $this->id,
            PHP_EOL,
            $this->birthdate
        );
    }


    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $age
     * @return void
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
       $this->id = $id;
    }

    /**
     * @param string $birthDate
     */
    public function setBirthDate(string $birthDate)
    {
        $this->birthdate = $birthDate;
    }

    /**
     * @param int $id
     * @param string $birthDate
     */
    public function setIdBirthDate(string $birthDate, int $id)
    {
        // TODO: Implement setIdBirthDate() method.
    }
}