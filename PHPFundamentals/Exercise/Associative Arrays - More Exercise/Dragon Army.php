<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 12-Dec-18
 * Time: 18:44 PM
 */

$n = intval(readline());
$dragonList = [];

for ($i = 0; $i < $n; $i++) {
    $input = readline();
    list($type, $name, $damage, $health, $armor) = explode(' ', $input);
    if (!array_key_exists($type, $dragonList))
        $dragonList[$type] = [];
    if ($damage == "null")
        $damage = 45;
    if ($health == "null")
        $health = 250;
    if ($armor == "null")
        $armor = 10;

    $dragonList[$type][$name] = ['damage' => intval($damage), 'health' => intval($health), 'armor' => intval($armor)];

}

function calculateStats($type, $array): float
{
    $stat = 0;
    foreach ($array as $name => $stats) {
        $stat += $stats[$type];
    }

    return round($stat / count($array), 2);
}

foreach ($dragonList as $type => $dragons) {
    ksort($dragons);
    printf('%s::(%0.2f/%0.2f/%0.2f)' . PHP_EOL, $type, calculateStats('damage', $dragons), calculateStats('health', $dragons), calculateStats('armor', $dragons));
    foreach ($dragons as $name => $stats) {
        printf('-%s -> damage: %d, health: %d, armor: %d' . PHP_EOL, $name, $stats['damage'], $stats['health'], $stats['armor']);
    }
}

//var_dump($dragonList);