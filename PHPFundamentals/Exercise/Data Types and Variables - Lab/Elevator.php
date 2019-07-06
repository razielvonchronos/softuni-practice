<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/28/2018
 * Time: 12:24 PM
 */

$n = intval(readline());
$p = intval(readline());
$courses = 0;

$courses = intval($n / $p);

if($n % $p > 0){
    $courses++;
}

print $courses;