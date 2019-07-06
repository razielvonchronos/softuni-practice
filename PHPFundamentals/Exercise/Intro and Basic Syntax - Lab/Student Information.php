<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/27/2018
 * Time: 16:12 PM
 */

$name = readline();
$age = intval(readline());
$grade = floatval(readline());

printf("Name: %s, Age: %d, Grade: %.02f", $name, $age, $grade);