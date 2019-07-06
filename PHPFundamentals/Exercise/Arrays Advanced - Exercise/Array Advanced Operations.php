<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/7/2018
 * Time: 14:06 PM
 */

$numbers = array_map('intval', explode(' ', readline()));
while(true){
    $tempArray = [];
    $input = explode(' ',readline());
    $cmd = $input[0];
    if($cmd == 'End'){
        break;
    }elseif($cmd == 'Add'){
        $value = $input[1];
        $tempArray = $numbers;
        array_push($tempArray, $value);
    }
    elseif($cmd == 'Insert'){
        $value = $input[1];
        $position = $input[2];
        $tempArray = $numbers;
        array_splice($tempArray, $position, 0, $value);
    }
    elseif($cmd == 'Remove'){
        $value = $input[1];
        $tempArray = $numbers;
        if(array_key_exists($value, $tempArray)){
            array_splice($tempArray, $value, 1);
        }else{
            echo 'Invalid index'.PHP_EOL;
        }
    }
    elseif($cmd == 'Shift'){
        $direction = $input[1];
        $n = $input[2];
        $tempArray = $numbers;
        for($i = 0; $i < $n;$i++){
            if($direction == 'left'){
                // first number becomes last
                $removed = array_shift($tempArray);
                array_push($tempArray, $removed);
            }elseif($direction == 'right'){
                // last number becomes first
                $removed = array_pop($tempArray);
                array_unshift($tempArray, $removed);
            }
        }

    }
    $numbers = $tempArray;
}

echo implode(' ', $numbers).PHP_EOL;

