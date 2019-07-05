<?php

$input = explode(' ', readline());

//$input = explode(' ', "1 2 3 0 1 2");
//$input = explode(' ', "3 2 3 4 2 2 4");

$seq = [0, 1];

for ($i = 0; $i < count($input); $i++) {
    $len = 1;
    $start = 0;
    for ($j = $i - 1; $j >= 0; $j--) {
        $a = $input[$j];
        $b = $input[$j + 1];
        if ($a >= $b)
            break;
        $start = $j;
        $len++;
    }

    if ($len == 1 || $len < $seq[1])
        continue;

    if($len == $seq[1] && $seq[0] < $start)
    {
        // check which is the leftmost
//        printf("%d %d vs %d %d " . PHP_EOL, $start, $len, $seq[0], $seq[1]);
        continue;
    }

    $seq = [$start, $len];
}

printf("%s" . PHP_EOL, implode(" ", array_slice($input, $seq[0], $seq[1])));

//var_dump($seq);