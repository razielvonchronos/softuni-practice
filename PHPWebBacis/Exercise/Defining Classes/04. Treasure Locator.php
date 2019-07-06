<?php

$cords = explode(', ', readline());

$map = [
    'Tokelau' => [0, 8, 1, 9],
    'Tuvalu' => [1, 1, 3, 3],
    'Samoa' => [3, 5, 6, 7],
    'Tonga' => [6, 0, 8, 2],
    'Cook' => [7, 4, 8, 9]
];

$pairs = [];
for ($i = 1; $i <= count($cords); $i += 2) {
    array_push($pairs, [doubleval($cords[$i - 1]), doubleval($cords[$i])]);
}

/**
 * @param array $map
 * @param array $position
 */
function GetAreaId(array &$map, array $position): void
{
    list($y, $x) = $position;
    $area = "On the bottom of the ocean";

    foreach ($map as $name => $cords) {
        list($x1, $y1, $x2, $y2) = $cords;
        if ($x1 <= $x && $x <= $x2 && $y1 <= $y && $y <= $y2)
            $area = $name;
    }
    printf('%s' . PHP_EOL, $area);
}

foreach ($pairs as $k => $position) {
    GetAreaId($map, $position);
}