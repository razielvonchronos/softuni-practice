<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/7/2018
 * Time: 02:25 AM
 */

$array = array_map('intval', explode(' ', readline()));

while(true){
    $tempArray = [];
    $input = explode(' ', readline());
    $cmd = $input[0];
    if($cmd == 'Insert'){
        $tempArray = $array;
        $value = intval($input[1]);
        $position = intval($input[2]);
        array_splice($tempArray, $position,0, $value);
    }elseif($cmd == 'Delete'){
        $value = intval($input[1]);
        for($i = 0;$i < count($array); $i++){
            if($array[$i] != $value){
                $tempArray[] = $array[$i];
            }
        }
    }else
        if($cmd == 'Odd') {
            for($i = 0;$i < count($array); $i++) {
                if ($array[$i] % 2 == 1) {
                    print $array[$i]. ' ';
                }
            }
            break;
        }elseif($cmd == 'Even'){
            for($i = 0;$i < count($array); $i++) {
                if($array[$i] % 2 == 0){
                    print $array[$i]. ' ';
                }
            }
            break;
        }
    $array = $tempArray;
}
//var_dump($array);