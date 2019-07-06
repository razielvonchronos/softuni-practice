<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 20-Nov-18
 * Time: 03:03 AM
 */

$input = readline();
$values = explode(',', preg_replace('/[ ]+/', ',',$input));

$sum = floatval(0);

foreach ($values as $value){
    $sumTemp = 0;
    $first = ord($value[0]);
    $last = ord(substr($value, -1));
    $number = substr($value, 1, strlen($value)-2);
    if($first >= 65 && $first <= 90) { // upper /
        $positionA = $first - 64;
        $sumTemp += $number / $positionA;
    }elseif($first >= 97 && $first <= 122){ // lower *
        $positionA = $first - 96;
        $sumTemp += $number * $positionA;
    }

    if($last >= 65 && $last <= 90) { // upper /
        $positionB = $last - 64;
        $sumTemp -= $positionB;
    }elseif($last >= 97 && $last <= 122) { // lower +
        $positionB = $last - 96;
        $sumTemp += $positionB;
    }
    $sum += $sumTemp;
}

printf('%.2f', round($sum,2));

