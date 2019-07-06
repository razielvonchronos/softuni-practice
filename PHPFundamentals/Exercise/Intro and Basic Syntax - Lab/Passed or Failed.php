<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/27/2018
 * Time: 16:32 PM
 */

$grade = floatval(readline());

if($grade >= 3.00){
    echo "Passed!";
}else{
    echo "Failed!";
}