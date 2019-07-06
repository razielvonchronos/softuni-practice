<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 04:18 AM
 */

$numbers  = explode(' ', readline());
$even = 0;
$odd = 0;

foreach($numbers as $number){
    if($number % 2 == 0){
        $even += $number;
    }
}

echo $even-$odd;