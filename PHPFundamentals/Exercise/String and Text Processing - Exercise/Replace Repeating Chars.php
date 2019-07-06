<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/19/2018
 * Time: 19:57 PM
 */

$string = readline();

for($i = 0; $i < strlen($string); $i++){
    $parrern = '/['.$string[$i].']{2,}/';
    $string =  preg_replace( $parrern, $string[$i], $string);
}

print $string;