<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/8/2018
 * Time: 18:32 PM
 */

$n = intval(readline());
$parking = [];

for($i = 0; $i < $n;$i++){
    $input = explode(' ', readline());
    list($cmd, $user) = $input;

    if($cmd == 'register'){
        $plate = $input[2];
        if(array_key_exists($user, $parking)){
            echo 'ERROR: already registered with plate number '.$parking[$user][0].PHP_EOL;
        }else{
            $parking[$user][] = $plate;
            printf(' %s registered %s successfully'.PHP_EOL, $user, $plate);
        }

    }
    if($cmd == 'unregister'){
        if(array_key_exists($user, $parking)){
            unset($parking[$user]);
            printf(' %s unregistered successfully'.PHP_EOL, $user);
        }else{

            printf('ERROR: user %s not found'.PHP_EOL, $user);
        }
    }

}
foreach($parking as $user => $plate){
    printf(' %s => %s'.PHP_EOL, $user, $plate[0]);
}
//var_dump($parking);