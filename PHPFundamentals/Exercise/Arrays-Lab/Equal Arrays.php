<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 04:35 AM
 */

$array_one = explode(" ", readline());
$array_two = explode(" ", readline());
$equal = true;
$sum = 0;
$index = 0;

foreach($array_one as $key => $a){
    if($a !== $array_two[$key]){
        $index = $key;
        $equal = false;
        break;
    }
    $sum += $a;
}

if($equal == true){
    echo "Arrays are identical. Sum: ".$sum;
}else{
    echo "Arrays are not identical. Found difference at ".$index." index.";
}