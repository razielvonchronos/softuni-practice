<?php


$sum = 0;
$matrix = [];

list($y, $x) = explode(', ', readline());

for ($row = 0; $row < $y; $row++){
    $matrix[] = explode(', ', readline());
}

foreach ($matrix as $row => $col)
    $sum += array_sum($col);

printf("%d\n%d\n%d\n", $y, $x, $sum);
