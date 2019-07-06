<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/27/2018
 * Time: 19:10 PM
 */

$n = intval(readline());

while(true){
    if($n % 2 == 1){
        print "Please write an even number.".PHP_EOL;
        $n = intval(readline());
    }else{
        print "The number is: ".abs($n);
        return;
    }
}
