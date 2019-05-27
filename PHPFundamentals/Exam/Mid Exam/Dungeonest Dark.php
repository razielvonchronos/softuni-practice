<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/4/2018
 * Time: 09:53 AM
 */


$input = explode('|', readline());
// $input = explode('|', "cat 10|potion 30|orc 10|chest 10|snake 25|chest 110");
// $input = explode('|', "rat 10|bat 20|potion 10|rat 10|chest 100|boss 70|chest 1000");

$health = 100;
$coins = 0;
$roomCount = 1;

foreach($input as $command){
    $room = explode(' ', $command);
    $content = $room[0];
    $value = intval($room[1]);
    if($content == 'potion') {
        if($health + $value > 100) {
            printf("You healed for %s hp.".PHP_EOL, abs(100 - $health));
            $health += 100 - $health;
        }else{
            printf("You healed for %s hp.".PHP_EOL, ($health + $value) - $health);
            $health += $value;
        }
        printf("Current health: %s hp.".PHP_EOL, $health);
        $roomCount++;
    }elseif($content == 'chest'){
        $coins += $value;
        printf("You found %s coins.".PHP_EOL, $value);
        $roomCount++;
    }else{
        if($health - $value > 0){
            $health -= $value;
            printf("You slayed %s.".PHP_EOL, $content);
            $roomCount++;
        }else{
            $health -= $value;
            printf("You died! Killed by %s.".PHP_EOL , $content);
            printf("Best room: %s".PHP_EOL , $roomCount);
            die();
        }
    }
}

printf("You've made it!\nCoins: %d\nHealth: %d".PHP_EOL , $coins, $health);