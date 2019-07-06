<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 28-Nov-18
 * Time: 20:52 PM
 */

$text = readline();
//$text = 'aaabbaaabbbccc';
$array = [];
for($i = 0; $i < strlen($text); $i++){
    if(!array_key_exists($text[$i], $array)){
        $array[$text[$i]] = 1;
    }else{
        $array[$text[$i]] += 1;
    }
}

foreach ($array as $alphabet => $amount){
    print $alphabet." -> ".$amount.PHP_EOL;
}