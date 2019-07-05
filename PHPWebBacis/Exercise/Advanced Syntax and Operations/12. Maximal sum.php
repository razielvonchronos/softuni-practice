<?php


$matrix = [];
$sums = [];
list($x, $y) = explode(' ', readline());

if($x < 3 || $y > 1000)
    return;

for ($row = 0; $row < $x; $row++) {
    $matrix[] = explode(' ', readline());
}

$count = 0;
for ($rw = 2; $rw < $x; $rw++) {
    for ($cl = 2; $cl < $y; $cl++) {
        $a1 = $matrix[$rw - 2][$cl - 2];
        $a2 = $matrix[$rw - 2][$cl - 1];
        $a3 = $matrix[$rw - 2][$cl];
        $b1 = $matrix[$rw - 1][$cl - 2];
        $b2 = $matrix[$rw - 1][$cl - 1];
        $b3 = $matrix[$rw - 1][$cl];
        $c1 = $matrix[$rw][$cl - 2];
        $c2 = $matrix[$rw][$cl - 1];
        $c3 = $matrix[$rw][$cl];
        $sums[$count] = [$a1, $a2, $a3, $b1, $b2, $b3, $c1, $c2, $c3];
        $count++;
    }
}

uksort($sums, function ($a, $b) use ($sums) {
    $sumA = array_sum($sums[$a]);
    $sumB = array_sum($sums[$b]);
    if($sumA == $sumB)
        return $b <=> $a;
    return $sumB <=> $sumA;
});

foreach ($sums as $k => $result) {
    printf('Sum = %d ' . PHP_EOL, array_sum($result));
    printf('%d %d %d ' . PHP_EOL, $result[0], $result[1], $result[2]);
    printf('%d %d %d' . PHP_EOL, $result[3], $result[4], $result[5]);
    printf('%d %d %d' . PHP_EOL, $result[6], $result[7], $result[8]);
    break;
}