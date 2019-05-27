<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 12/16/2018
 * Time: 10:00 AM
 */


function encrypt($artist, $song): string{

    $encryption = '';

    $key = strlen($artist);

    for($i = 0; $i < strlen($artist); $i++){
        $character = ord($artist[$i]);
        if($character != 39){
            if($artist[$i] != " "){
                for($k = 0; $k < $key; $k++){
                    $character++;
                    if($i == 0 && $character > 90){
                        $character = 65;
                    }
                    if($character > 122){
                        $character = 97;
                    }
                }
            }
        }
        $encryption .= chr($character);
    }

    $encryption .= "@";

    for($i = 0; $i < strlen($song); $i++){
        $character = ord($song[$i]);
        if($character != 39){
            if($song[$i] != " "){
                for($k = 0; $k < $key; $k++){
                    $character++;
                    if($character > 90){
                        $character = 65;
                    }
                }
            }
        }
        $encryption .= chr($character);
    }
    return $encryption;
}

while(true){
    $input = readline();
    if($input == 'end'){
        break;
    }

    list($artist,$song) = explode(':', $input);

    $valid = true;

    if(!(ord($artist[0]) >= 65 && ord($artist[0]) <= 90)){
        $valid = false;
//        print 'Invalid Character: '.$song[0]." ".$song.PHP_EOL;
    }else{
        for($a = 1; $a < strlen($artist);$a++){
            if(!(ord($artist[$a]) >= 97 && ord($artist[$a]) <= 122)){
                if($artist[$a] != " "){
                    if($artist[$a] != "'"){
                        $valid = false;
//                        print 'Invalid Character: '.$artist[$a]." ".$artist.PHP_EOL;
                    }
                }
            }
        }
    }

    for($s = 0; $s < strlen($song);$s++){
        if(!(ord($song[$s]) >= 65 && ord($song[$s]) <= 90)){
            if($song[$s] != " "){
                $valid = false;
            }
        }
    }

    if($valid){
        $encryption = encrypt($artist,$song);
        printf('Successful encryption: %s'.PHP_EOL, encrypt($artist,$song));
    }else{
        printf('Invalid input!'.PHP_EOL);
    }

}