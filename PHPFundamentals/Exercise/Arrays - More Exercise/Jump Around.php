<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/3/2018
 * Time: 14:27 PM
 */

$array = array_map('intval', explode(' ', readline()));
//$array = array(2,3,5,7,5,4,8,4);
//$array = array(2,3,5,7,5,4,8,4);
$index = 0;
$sum = 0;

while(true){
    $length = count($array)-1;
    $sum += $array[$index];
    if($index + $array[$index] <= $length){
        $index += $array[$index];
    }elseif($index - $array[$index] >= 0){
        $index -= $array[$index];
    }else{
        break;
    }
}
echo $sum;