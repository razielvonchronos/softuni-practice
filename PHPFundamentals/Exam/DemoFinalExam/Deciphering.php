<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 03-Dec-18
 * Time: 01:07 AM
 */
$valid = true;

$encrypted = readline();
list($replace, $replacement) = explode(' ', readline());
//$encrypted = "wkhfn#|rx#jhqfkr#phf#exw#|rxu#uholf#lv#khfgohg#lq#hfrwkhu#sohfhw";
//list($replace, $replacement) = explode(' ', "ec an");

$decrypted = "";

for ($i = 0; $i < strlen($encrypted); $i++){
    $symbol = $encrypted[$i];
    if(ord($symbol) < 100 && 125 > ord($symbol)){ // [a-z] [{] [}] [|]
        if(ord($symbol) != 35) // [#]
            $valid = false;
    }

    $decrypted .= chr(ord($symbol) - 3);
}

if($valid){
    print $decrypted_v2 = str_replace($replace,$replacement,$decrypted);
}else{
    print "This is not the book you are looking for.";
}
