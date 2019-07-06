<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/19/2018
 * Time: 20:05 PM
 */

$string =  readline();
//$string =  'abv>1>1>2>2asdasd';
$explosion = 0;

for($i = 0; $i < strlen($string); $i++){
    $symbol = $string[$i];
    if($symbol == '>') {
        $explosion += intval($string[$i+1]);
    }else
    {
        if($explosion > 0){
            $string = substr_replace($string, '', $i, 1);
            $explosion--;
            $i--;
        }
    }
}
echo $string.PHP_EOL;
