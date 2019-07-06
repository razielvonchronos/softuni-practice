<?php

$input = readline();
$digits = str_split($input);

function array_avg(&$digits)
{
    return array_sum($digits) / count($digits);
}

$avg = array_avg($digits);

while ($avg <= 5) {
    $digits[] = 9;
    $avg = array_avg($digits);
}
print implode('', $digits);

