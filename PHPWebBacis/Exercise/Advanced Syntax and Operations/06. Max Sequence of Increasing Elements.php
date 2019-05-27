<?php

$input = explode(' ', readline());

$sequence = ['key' => 0, 'len'=> 1];

for ($i = count($input) - 1; $i >= 0; $i--) {
    $len = 0;
    for ($j = $i - 1; $j >= 0; $j--) {
        $a = $input[$i];
        $b = $input[$j];
        if($a > $b)
            $len++;
    }

    if($sequence['len'] <= $len)
        $sequence = ['key' => $i, 'len'=> $len];
}

$sequence['value'] = array_slice($input, $sequence['key'], $sequence['len']);
print implode(' ', $sequence['value']);

//var_dump($sequence);