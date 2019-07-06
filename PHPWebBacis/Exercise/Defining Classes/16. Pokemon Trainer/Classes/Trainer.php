<?php


namespace Pokemon;


class Trainer
{
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var int $badges
     */
    private $badges;
    /**
     * @var Pokemon[] $pokemons
     */
    private $pokemons = [];

    /**
     * Trainer constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->badges = 0;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $name
     */
    public function setName(int $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getBadges(): int
    {
        return $this->badges;
    }

    /**
     * @param int $badges
     */
    public function setBadges(int $badges): void
    {
        $this->badges = $badges;
    }

    /**
     * @return array
     */
    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    /**
     * @param array $pokemons
     */
    public function setPokemons(array $pokemons): void
    {
        $this->pokemons = $pokemons;
    }

    /**
     * @param Pokemon $pokemon
     */
    public function catchPokemon(Pokemon $pokemon): void
    {
        $this->pokemons[] = $pokemon;
    }

    /**
     * @param string $type
     * @return bool
     */
    public function HasElementalType(string $type): bool
    {

        foreach ($this->pokemons as $pokemon)
            if ($pokemon->getElement() == $type && $pokemon->IsAlive())
                return true;
        return false;
    }

    /**
     * @param int $damage
     */
    public function damagePokemon(int $damage)
    {
        /** @var Pokemon $pokemon */
        foreach ($this->pokemons as &$pokemon) {
            $pokemon->TakeDamage($damage);
            if (!$pokemon->IsAlive())
                $this->RemovePokemon($pokemon);
        }
    }

    /**
     *
     */
    public function addBadge(): void
    {
        $this->badges++;
    }

    /**
     * @param Pokemon $pokemon
     */
    private function RemovePokemon(Pokemon $pokemon)
    {
        $key = array_search($pokemon, $this->pokemons);
        unset($this->pokemons[$key]);
    }

    /**
     * @return int
     */
    public function getPokemonsCount(): int
    {
        return count($this->pokemons);
    }
}