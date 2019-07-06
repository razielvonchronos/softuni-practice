<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 25-Nov-18
 * Time: 13:34 PM
 */

//$number = strval(readline());
//$n = intval(readline());

$number = "9999";
$n = 9;


$inMind = 0; // edno na um
$remainder = 0;
$numberR = strrev($number);

for ($i = 0; $i < strlen($number); $i++) {
    $a = ($numberR[$i] * $n);

    if($a > 10){
        $remainder = $a / 10;
        $inMind = $a % 10;
    }else{
        $remainder = $a;
        $inMind = 0;
    }
    $numberR[$i] = $remainder  + $inMind;
};
if($inMind > 0){
    $numberR[strlen($numberR)] = $inMind;
}
print strrev($numberR);


/*
при вход:
923847238931983192462832102
4
изхода се очаква да е
3695388955727932769851328408
но ми връща
3695388955727932301651214336
*/