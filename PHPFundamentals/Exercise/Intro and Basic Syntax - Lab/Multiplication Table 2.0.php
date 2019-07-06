<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/27/2018
 * Time: 18:58 PM
 */

$n = intval(readline());
$multiplier = intval(readline());

if($n > 0 && $n <= 100){
    if($multiplier > 10){
        echo $n." X ".$multiplier ." = ".($multiplier*$n).PHP_EOL;
    }else{
        for($i = $multiplier; $i <= 10; $i++){
            echo $n." X ".$i ." = ".($i*$n).PHP_EOL;
        }
    }
}