<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/27/2018
 * Time: 18:04 PM
 */

$n = intval(readline());
$sum = 0;
$count = 0;
if($n > 0 && $n <= 100){
    for($i = 1; $count < $n; $i++){
        if($i % 2 == 1){
            echo $i.PHP_EOL;
            $sum += $i;
            $count++;
        }
    }
    print "Sum: ".$sum;
}