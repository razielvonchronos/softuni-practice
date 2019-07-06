<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/27/2018
 * Time: 18:38 PM
 */

$n = intval(readline());
if($n > 0 && $n <= 100){
    for($i = 1; $i <= 10; $i++){
        echo $n." X ".$i ." = ".($i*$n).PHP_EOL;
    }
}