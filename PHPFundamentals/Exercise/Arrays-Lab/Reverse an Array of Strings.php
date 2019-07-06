<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 04:09 AM
 */

$array = explode(" ", readline());
$newArray = [];

for($i = count($array)-1; $i >= 0; $i--){
     $newArray[] = $array[$i];
}

//var_dump($newArray);
echo implode(' ', $newArray);