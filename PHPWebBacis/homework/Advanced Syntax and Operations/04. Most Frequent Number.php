<?php

$input = explode(' ', readline());

$sequence = [];

foreach ($input as $value){
    if(key_exists($value, $sequence))
    {
        $sequence[$value]++;
        continue;
    }
    $sequence[$value] = 0;
}

arsort($sequence);

printf('%d', key($sequence));