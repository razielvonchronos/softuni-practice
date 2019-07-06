<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/9/2018
 * Time: 08:39 AM
 */

$gain = [];
$line = 1;
$material = null;

function showResults(array $gain){
    foreach ($gain as $key => $material){
        print $key.' -> '.array_sum($material).'K'.PHP_EOL;
    }
//    var_dump($gain);
}

while(true){
    $input = readline();
    if($line % 2 == 1){
        $material = $input;
        if($material == 'stop'){
            showResults($gain);
            exit;
        }
        if(!array_key_exists($material,$gain)){
            $gain[$material] = [];
        }
    }else{
        $gain[$material][] = intval($input);
    }

//    var_dump($gain);
    $line++;
}
