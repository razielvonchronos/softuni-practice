<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 28-Nov-18
 * Time: 21:07 PM
 */

$input = explode(' ', readline());
$array = [];

foreach ($input as $number){
    if(!array_key_exists($number, $array)){
        $array[$number] = 1;
    }else{
        $array[$number]++;
    }
}
ksort($array);

foreach ($array as $number => $count){
    printf('%s -> %d'.PHP_EOL, $number, $count);
}