<?php

$n = explode(' ', readline());
$k = intval(readline());

$array = [];

for ($i = 0; $i < $k; $i++) {
    $a = array_pop($n);
    array_unshift($n, $a);
    $array[$i] = $n;
}

$results = [];

for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($n); $j++)
    {
        if(!isset($results[$j]))
            $results[$j] = 0;
        $results[$j] += $array[$i][$j];
    }
}

print implode(' ', $results).PHP_EOL;