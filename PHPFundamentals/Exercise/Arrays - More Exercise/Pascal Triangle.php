<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/3/2018
 * Time: 10:00 AM
 */

$n = intval(readline());
$array = array(1);

for($i = 0; $i < $n;$i++){
    $temp = [1];
    if($i > 0){
        for($j = 0; $j < count($array)-1;$j++){
            $temp[] =  $array[$j] +  $array[$j+1];
        }
        $temp[] = 1;
    }
    $array = $temp;
    echo implode(' ',  $array).PHP_EOL;
}
