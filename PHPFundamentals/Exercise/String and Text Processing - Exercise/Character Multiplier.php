<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/19/2018
 * Time: 14:17 PM
 */

$strings = explode(' ', readline());
//$strings = explode(' ', 'a aaaa');
$sum = 0;

usort($strings, function($a,$b){
    if(strlen($a) == strlen($b)){
        return 0;
    }else{
        return strlen($a) > strlen($b) ? -1 : 1;
    }
});

list($str1, $str2) = $strings;

for ($i = 0; $i < strlen($str1); $i++){
    if(isset($str2[$i])){
        $sum += ord($str1[$i]) * ord($str2[$i]);
    }else{
        $sum += ord($str1[$i]);
    }
}
print $sum;