<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 02:56 AM
 */

$n = intval(readline());
$char = 97 + $n;

for($i = 97; $i < $char;$i++){
    for($k = 97; $k < $char;$k++){
        for($j = 97; $j < $char;$j++){
            echo chr($i).chr($k).chr($j).PHP_EOL;
        }
    }
}