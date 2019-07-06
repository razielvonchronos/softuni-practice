<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 29-Nov-18
 * Time: 02:03 AM
 */

$input = explode(', ', readline());
$towns = [];
$town = null;

foreach ($input as $key => $value){
    if($key % 2 == 0){
        $town = $value;
        if(!array_key_exists($town, $towns)){
            $towns[$town] = 0;
        }
    }else{
        $population = intval($value);
        $towns[$town] += $population;
    }
}

foreach ($towns as $town => $population){
    printf('%s => %d'.PHP_EOL , $town, $population);
}