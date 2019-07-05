<?php

$matrix = [];
$sums = [];
list($x, $y) = explode(', ', readline());

for ($row = 0; $row < $x; $row++) {
    $matrix[] = explode(', ', readline());
}
$count = 0;
for ($rw = 1; $rw < $x; $rw++) {
    for ($cl = 1; $cl < $y; $cl++) {
        $a = $matrix[$rw - 1][$cl - 1];
        $b = $matrix[$rw - 1][$cl];
        $c = $matrix[$rw][$cl - 1];
        $d = $matrix[$rw][$cl];
        $sums[$count] = [$a, $b, $c, $d];
        $count++;
    }
}

uksort($sums, function ($a, $b) use ($sums) {
//   printf("%d %d".PHP_EOL, array_sum($sums[$a]), array_sum($sums[$b]));
    $sumA = array_sum($sums[$a]);
    $sumB = array_sum($sums[$b]);
    return $sumB <=> $sumA;
});

foreach ($sums as $k => $result)
{
    printf('%d %d ' . PHP_EOL, $result[0], $result[1]);
    printf('%d %d' . PHP_EOL, $result[2], $result[3]);
    printf('%d '. PHP_EOL, array_sum($result));
    break;
}