<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 01:10 AM
 */

$n = intval(readline());

for($i = 1; $i <= $n;$i++){
    $sum = 0;
    $number = $i;

    while($number > 0){
        $sum += ($number % 10);
        $number /= 10;
    }

    if($sum == 5 ||$sum == 7 ||$sum == 11){
        echo $i." -> True".PHP_EOL;
    }else{
        echo $i." -> False".PHP_EOL;
    }
}