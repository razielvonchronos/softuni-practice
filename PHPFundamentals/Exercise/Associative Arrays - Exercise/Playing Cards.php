<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/9/2018
 * Time: 11:36 AM
 */

$memoryCards = [];

function calculateResult(array $cards)
{
    $score = 0;
    foreach ($cards as $key => $card) {
        $power = $card[0];
        $type = $card[-1];

        $multiplier = 0;

        if ($power == "J") {
            $power = 11;
        } elseif ($power == "Q") {
            $power = 12;
        } elseif ($power == "K") {
            $power = 13;
        } elseif ($power == "A") {
            $power = 14;
        }
        elseif ($power == "1") {
            $power = 10;
        }

        if ($type == "C") {
            $multiplier = 1;
        } elseif ($type == "D") {
            $multiplier = 2;
        } elseif ($type == "H") {
            $multiplier = 3;
        } elseif ($type == "S") {
            $multiplier = 4;
        }

        $score += $power * $multiplier;
    }
    return $score;
}

function showResults(array $array): void
{
    foreach ($array as $player => $deck) {
        $score = 0;
        print $player . ': ';
        foreach ($deck as $key => $cards) {
            $score += calculateResult($cards);
        }
        print $score . PHP_EOL;
    }
}

function cardAvailable($player, $card, $memoryCards): bool
{
    $cardAvailable = true;
    foreach ($memoryCards as $plr => $decks)
        if ($plr == $player) {
            foreach ($decks as $cards) {
                if (in_array($card, $cards)) {
                    $cardAvailable = false;
                }
            }
        }
    return $cardAvailable;
}

while (true) {
    $input = readline();
    if ($input == 'JOKER') {
        showResults($memoryCards);
        break;
    }
    $draw = explode(': ', $input);
    list($player, $hand) = $draw;
    $cards = explode(', ', $hand);
    $arrayFiltered = [];
//        A single person cannot have more than one card with the same power and type,
//        if they draw such a card they discard it.
    foreach ($cards as $card) {
        if (cardAvailable($player, $card, $memoryCards) && !in_array($card, $arrayFiltered)) {
            $arrayFiltered[] = $card;
        }
    }
    $memoryCards[$player][] = $arrayFiltered;
}