<?php

namespace Pokemon;

class Pokemon
{
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var string $element
     */
    private $element;
    /**
     * @var int $health
     */
    private $health;

    /**
     * Pokemon constructor.
     * @param string $name
     * @param string $element
     * @param int $health
     */
    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
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
    public function getElement(): string
    {
        return $this->element;
    }

    /**
     * @param string $element
     */
    public function setElement(string $element): void
    {
        $this->element = $element;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    /**
     * @param int $damage
     */
    public function TakeDamage(int $damage)
    {
        $this->health -= $damage;
    }

    /**
     * @return bool
     */
    public function IsAlive(): bool
    {
        return $this->health > 0;
    }

}