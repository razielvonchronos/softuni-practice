<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 15:04 PM
 */

$numbers  = explode(' ', readline());
$even = 0;
$odd = 0;

foreach($numbers as $number){
    if($number % 2 == 0){
        $even += $number;
    }else{
        $odd += $number;
    }
}

echo ($even-$odd);