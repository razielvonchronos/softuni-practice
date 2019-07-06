<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/27/2018
 * Time: 17:21 PM
 */

$day = strtolower(readline());
$age = intval(readline());
$price = 0;

if($day == 'weekday'){
    if($age >= 0 && $age <= 18){
        $price = 12;
    }
    elseif($age > 18 && $age <= 64){
        $price = 18;
    }
    else if($age > 64 && $age <= 122){
        $price = 12;
    }else{
        $price = 0;
    }

}
elseif($day == 'weekend'){
    if($age > 0 && $age <= 18){
        $price = 15;
    }
    else if($age > 18 && $age <= 64){
        $price = 20;
    }
    elseif($age > 64 && $age <= 122){
        $price = 15;
    }else{
        $price = 0;
    }

}
elseif($day == 'holiday'){
    if($age > 0 && $age <= 18){
        $price = 5;
    }
    elseif($age > 18 && $age <= 64){
        $price = 12;
    }
    else if($age > 64 && $age <= 122){
        $price = 10;
    }else{
        $price = 0;
    }
}
else{

}

print $price > 0 ? $price.'$' : 'Error!';