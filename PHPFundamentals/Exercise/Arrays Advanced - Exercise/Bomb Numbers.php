<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/7/2018
 * Time: 15:32 PM
 * Exercise: https://judge.softuni.bg/Contests/Compete/Index/1218#4
 */

$sequence = array_map('intval', explode(' ', readline()));
$cmd  = array_map('intval', explode(' ', readline()));

$bomb = $cmd[0];
$power = $cmd[1];

for($i = 0; $i < count($sequence); $i++){
    if($sequence[$i] == $bomb){
        array_splice($sequence, $i , $power);
        array_splice($sequence, $i - $power , $power+1);
//        echo implode(' ',$sequence).PHP_EOL;
    }
}
echo array_sum($sequence);
