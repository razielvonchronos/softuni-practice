<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 04:55 AM
 */

$numbers = array_map('intval', explode(' ', readline()));
$sumArray = $numbers;

while(count($sumArray) > 1){
    $tempArray = [];
    for($i = 0; $i < count($sumArray)-1;$i++){
        $tempArray[] = $sumArray[$i]+$sumArray[$i+1];
    }
    $sumArray = $tempArray;
}

echo implode(' ',$sumArray);