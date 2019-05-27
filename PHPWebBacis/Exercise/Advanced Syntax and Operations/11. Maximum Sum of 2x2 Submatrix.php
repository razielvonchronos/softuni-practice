<?php

$sum = 0;
$matrix = [];
list($y, $x) = explode(', ', readline());


for ($row = 0; $row < $y; $row++) {
    $matrix[] = explode(', ', readline());
}

$square = [];

for ($r = count($matrix) - 1; $r >= 0; $r--) {
    $square[$r] = [0, 1];
    for ($c = 0; $c < count($matrix[$r]); $c++) {
        if (!isset($matrix[$r][$c + 1]))
            continue;
        if ($matrix[$r][$c] + $matrix[$r][$c + 1] > $matrix[$r][$square[$r][$a]] + $matrix[$r][$square[$r][$b]])
            list($a, $b) = [$c, $c + 1];
    }
}

//var_dump($square);
$sum = 0;
$square = array_reverse($square);
foreach ($square as $r => $v) {
    printf('%d %d' . PHP_EOL, $matrix[$r][$a], $matrix[$r][$b]);
    $sum += $matrix[$r][$a] + $matrix[$r][$b];
}
print $sum;