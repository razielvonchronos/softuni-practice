<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 28-Nov-18
 * Time: 21:27 PM
 */

$input = explode(' ', readline());

$words = array_map('strtolower', $input);
$array = [];

foreach($words as $word){
    if(!array_key_exists($word, $array)){
        $array[$word] = 1;
    }else{
        $array[$word]++;
    }
}

foreach ( $array as $key => $value){
    if($value % 2 == 1){
        echo $key." ";
    }
}