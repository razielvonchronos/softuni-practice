<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/28/2018
 * Time: 12:15 PM
 */

$a = intval(readline());
$b = intval(readline());
$c = intval(readline());
$d = intval(readline());

$sum = intval($a + $b);
$sum = intval($sum / $c);
$sum *= intval($d);

print $sum;