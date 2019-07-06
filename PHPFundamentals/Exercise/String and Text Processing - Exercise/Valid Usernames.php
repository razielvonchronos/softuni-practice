<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/18/2018
 * Time: 13:01 PM
 */

//$usernames = "sh, too_long_username, !lleg@l ch@rs, jeffbutt";
$usernames = explode(', ' ,readline());


foreach($usernames as $username){
    $isValid = false;
    $validChars = 0;
    $length = strlen($username);
    if($length >= 3 && $length <= 16){
        for($c = 0; $c < $length; $c++){
            $value = $username[$c];
            if(ord($value) == 95 || ord($value) == 45 || ctype_alpha($value) || ctype_digit($value)){
                $validChars++;
            }
        }
        if($validChars == $length){
            print $username.PHP_EOL;
        }
    }
}