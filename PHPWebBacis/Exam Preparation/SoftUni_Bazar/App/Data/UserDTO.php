<?php


namespace App\Data;


class UserDTO
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var string $password
     */
    private $password;
    /**
     * @var string $full_name
     */
    private $full_name;
    /**
     * @var string $location
     */
    private $location;
    /**
     * @var string $phone
     */
    private $phone;

    /**
     * UserDTO constructor.
     * @param int $id
     * @param string $name
     * @param string $password
     * @param string $full_name
     * @param string $location
     * @param string $phone
     */
    public function __construct(int $id, string $name, string $password, string $full_name, string $location, string $phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->full_name = $full_name;
        $this->location = $location;
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->full_name;
    }

    /**
     * @param string $full_name
     */
    public function setFullName(string $full_name): void
    {
        $this->full_name = $full_name;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

}