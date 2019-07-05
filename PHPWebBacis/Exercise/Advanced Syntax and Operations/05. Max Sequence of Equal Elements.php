<?php

$input = explode(' ', readline());

//$input = explode(' ', "4 4 4 4");

$sequence = ['key' => 0, 'len' => 1];

for ($i = 1; $i <= count($input) - 1; $i++) {
    $len = 1;
    for ($j = $i - 1; $j >= 0; $j--) {
        $a = $input[$i];
        $b = $input[$j];
        if ($a != $b)
            break;
        $len++;
    }
    if ($sequence['len'] < $len)
        $sequence = ['key' => ($i - $len) + 1, 'len' => $len];
}

$sequence['value'] = array_slice($input, $sequence['key'] , $sequence['len']);
print implode(' ', $sequence['value']);

//var_dump($sequence);