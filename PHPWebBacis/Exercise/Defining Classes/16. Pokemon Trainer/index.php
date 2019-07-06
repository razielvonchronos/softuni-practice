<?php

include_once 'Classes/Pokemon.php';
include_once 'Classes/Trainer.php';

use Pokemon\Pokemon;
use Pokemon\Trainer;

/** @var Trainer[] $trainers */
$trainers = [];

while (true) {
    $input = readline();
    if ($input == "Tournament")
        break;

    list($trainer, $name, $element, $health) = explode(' ', $input);

    if (!array_key_exists($trainer, $trainers))
        $trainers[$trainer] = new Trainer($trainer);
    $pokemon = new Pokemon($name, $element, $health);

    $trainers[$trainer]->catchPokemon($pokemon);

}

while (true) {
    $input2 = readline();
    if ($input2 == "End")
        break;

    foreach ($trainers as &$trainer) {
        $hasElement = $trainer->HasElementalType($input2);
        $hasElement ? $trainer->addBadge() : $trainer->damagePokemon(10);
    }
}

uasort($trainers, function (Trainer $a, Trainer $b) use ($trainers) {
    $trainer_a = $a->getBadges();
    $trainer_b = $b->getBadges();
    return $trainer_b <=> $trainer_a;
});

foreach ($trainers as &$trainer) {
    printf('%s %d %d' . PHP_EOL, $trainer->getName(), $trainer->getBadges(), $trainer->getPokemonsCount());
}