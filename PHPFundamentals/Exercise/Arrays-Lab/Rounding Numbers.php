<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 03:53 AM
 */

$numbers = array_map('doubleval', explode(" ", readline()));

foreach ($numbers as $number){
    printf("%.02f => %d\n",$number,round($number));
}

//var_dump($numbers);