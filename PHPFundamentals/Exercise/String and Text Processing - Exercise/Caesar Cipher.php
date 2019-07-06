<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/19/2018
 * Time: 18:40 PM
 */

$msg = readline();

function Encrypt($a){
    return chr(ord($a) + 3);
}

for($i = 0; $i < strlen($msg); $i++){
    print Encrypt($msg[$i]);
}