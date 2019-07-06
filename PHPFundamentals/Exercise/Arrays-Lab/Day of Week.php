<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 03:28 AM
 */

$dayOfWeek = array('Invalid Day!','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');

$n = intval(readline());

if($n > 0 && 7 >= $n){
    echo $dayOfWeek[$n];
}else{
    echo $dayOfWeek[0];
}
//var_dump($dayOfWeek);