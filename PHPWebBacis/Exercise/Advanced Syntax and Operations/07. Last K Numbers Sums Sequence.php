<?php

$n = readline();
$k = readline();
$sequence[] = 1;

for($i = 1; $i < $n; $i++)
{
    $new = 0;
    for ($b = 1; $b <= $k; $b++){
        if(!isset($sequence[$i - $b]))
            continue;
        $new += $sequence[$i - $b];
    }
    $sequence[$i] = $new;
}

print implode(' ', $sequence);