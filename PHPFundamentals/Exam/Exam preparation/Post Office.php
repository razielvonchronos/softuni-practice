<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 12/15/2018
 * Time: 19:16 PM
 */

$input = readline();

$decrypt = [];

list($first, $second, $third) = explode('|', $input);

if (preg_match('/[$][A-Z]+[$]/m', $first, $firstMatch) ||
    preg_match('/[#][A-Z]+[#]/m', $first, $firstMatch) ||
    preg_match('/[%][A-Z]+[%]/m', $first, $firstMatch) ||
    preg_match('/[*][A-Z]+[*]/m', $first, $firstMatch) ||
    preg_match('/[&][A-Z]+[&]/m', $first, $firstMatch)) {
    for($i = 1; $i < strlen($firstMatch[0])-1;$i++){
        $decrypt[$firstMatch[0][$i]] = 0;
    }
}

if (preg_match_all('/[0-9][0-9]+:[0-9][0-9]/m', $second, $secondMatch)){
    foreach ($secondMatch[0] as $k => $v){
        list($char,$len) = explode(':', $v);
        if(array_key_exists(chr($char), $decrypt)){
            $decrypt[chr($char)] = intval($len+1);
        }
    }
}

foreach ($decrypt as $firstLetter => $len){
    $word = explode(' ', $third);
    foreach ($word as $k => $v){
        if($v[0] == $firstLetter && strlen($v) == $len){
            print $v.PHP_EOL;
        }
    }
}

//var_dump($decrypt);