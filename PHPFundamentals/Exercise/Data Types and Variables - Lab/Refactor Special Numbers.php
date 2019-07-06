<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 03:19 AM
 */

$n = intval(readline());

for ($i = 1; $i <= $n;$i++) {
    $sum = 0;
    $number = $i;
    while ($number > 0) {
        $sum += $number % 10;
        $number /=  10;
    }
    $isEqual = ($sum == 5) || ($sum == 7) || ($sum == 11);
    $boolean = $isEqual ? "True" : "False";
    echo sprintf("%d -> %s", $i, $boolean) . PHP_EOL;
}
