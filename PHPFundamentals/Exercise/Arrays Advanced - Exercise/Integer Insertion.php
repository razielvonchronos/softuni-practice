<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/7/2018
 * Time: 21:46 PM
 */

$array = array_map('intval', explode(' ', readline()));

while(true){
    $input = readline();
    if($input == 'end'){
        break;
    }else{
        $index = intval($input[0]);
        $integer = intval($input);
        array_splice($array, $index, 0 , $integer);
    }

}
echo implode(' ', $array).PHP_EOL;