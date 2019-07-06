<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/1/2018
 * Time: 19:31 PM
 */

$count = intval(readline());
$final = array();
for($i = 0; $i < $count; $i++){
    $sum = 0;
    $string = readline();
    for($v=0;$v < strlen($string);$v++){
        if($string[$v] == 'a' || $string[$v] == 'e' || $string[$v] == 'i' || $string[$v] == 'o' ||  $string[$v] == 'u'){
            $sum += (ord($string[$v]) * strlen($string));
//            var_dump(ord($string[$v]) * strlen($string));
        }else{
            $sum += intval(ord($string[$v]) / strlen($string));
//            var_dump(ord($string[$v]) / strlen($string));
        }
    }
    $final[] = $sum;

}

 sort($final);
if (!empty($final)) {
    foreach($final as $number){
        print $number.PHP_EOL;
    }
}
