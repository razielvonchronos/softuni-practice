<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/7/2018
 * Time: 03:40 AM
 */

$n = intval(readline());
$going = [];

for($i = 1; $i <= $n; $i++){
    $input = explode(' ', readline());
    $name = $input[0];
    // is going;
    if(count($input) == 3){
        if(!in_array($name, $going)){
            $going[] = $name;
        }else{
            echo $name." is already in the list!".PHP_EOL;
        }
    }elseif(count($input) == 4){
        if(!in_array($name, $going)){
            echo $name." is not in the list!".PHP_EOL;
        }else{
            for($j = 0; $j < count($going); $j++){
                if($going[$j] == $name){
                    array_splice($going, $j, 1);
                }
            }
        }
    }
}
echo implode(' '.PHP_EOL, $going);