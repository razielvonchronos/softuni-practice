<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/4/2018
 * Time: 09:35 AM
 */
//
$partySize = intval(readline());
$days = intval(readline());
//$partySize = 3;
//$days = 5;
$coins = 0;

for($i = 0; $i < $days; $i++){
    if(($i+1) % 10 == 0){
        $partySize -= 2;
    }
    if(($i+1) % 15 == 0){
        $partySize += 5;
    }
    $coins -= $partySize * 2;

    if(($i+1) % 3 == 0){
        $coins -= $partySize * 3;
    }

    if(($i+1) % 5 == 0){
        $coins += $partySize * 20;
        if(($i+1) % 3 == 0){
            $coins -= $partySize * 2;
        }
    }
    $coins += 50;
}

printf('%d companions received %d coins each.', $partySize,  floor($coins / $partySize));