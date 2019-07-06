<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 03:40 AM
 */

$n = intval(readline());
$numbers = [];

for($i = 0;$i < $n;$i++){
    $numbers[]= readline();
}

for($r = --$n;$r >= 0;$r--){
    echo $numbers[$r]." ";
}