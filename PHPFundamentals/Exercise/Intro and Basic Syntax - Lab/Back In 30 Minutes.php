<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/27/2018
 * Time: 16:46 PM
 */

$hours = intval(readline());
$minutes = intval(readline());

if($hours >= 0 && $hours <= 23){
    if($minutes >= 0 && $minutes <= 60){
        if(($minutes + 30) > 59){
            $minutes = ($minutes+30) % 60;
            $hours++;
        }else{
            $minutes += 30;
        }

    }
    if($hours > 23)
        $hours = 0;

}

printf("%2d:%02d", $hours, $minutes);