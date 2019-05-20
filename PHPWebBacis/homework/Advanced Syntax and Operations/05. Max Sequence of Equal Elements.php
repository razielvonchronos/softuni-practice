<?php

$input = explode(' ', readline());

$sequence = ['key' => 0, 'len'=> 1];

for ($i = count($input) - 1; $i >= 0; $i--) {
    $key = $i;
    $len  = 1;
    for ($j = $i - 1; $j >= 0; $j--) {
        // make the code looking more understandable by setting $a and $b variables
        $a = $input[$i];
        $b = $input[$j];
        if ($b != $a)
            break;
        $key = $j;
        $len++;
    }
    if($sequence['len'] <= $len)
        $sequence = ['key' => $key, 'len'=> $len];
}

$sequence['value'] = array_slice($input, $sequence['key'], $sequence['len']);
print implode(' ', $sequence['value']);

//var_dump($sequence);