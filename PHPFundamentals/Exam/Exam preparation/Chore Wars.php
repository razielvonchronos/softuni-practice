<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 15-Dec-18
 * Time: 04:04 AM
 */

$manHaveAChoice = true;
$choreList = ['doingDishes' => 0, 'cleaningHouse' => 0, 'doingLaundry' => 0, 'totalTime' => 0];

/*
* This solution will be whiten without a regex, because I like it heavy!
*/
function validCommand($cmd, $type): bool
{
    $valid = true;
    if ($type == 'dishes') {
        for ($i = 0; $i < strlen($cmd); $i++) {
            if (ord($cmd[$i]) < 48 && ord($cmd[$i]) > 57)
                if (ord($cmd[$i]) < 97 && ord($cmd[$i]) > 122)
                    $valid = false;
        }
    } elseif ($type == 'house') {
        for ($i = 0; $i < strlen($cmd); $i++) {
            if (ord($cmd[$i]) < 48 && ord($cmd[$i]) > 57)
                if (ord($cmd[$i]) < 65 && ord($cmd[$i]) > 90)
                    $valid = false;
        }
    }

    return $valid;
}

while ($manHaveAChoice) {
    $input = readline();
    if ($input == 'wife is happy') {
        $manHaveAChoice = false;
        break;
    }
    $cmd = '';
    // first lets find the dishes command:
    // doing dishes
    if (strpos($input, '<') !== false && strpos($input, '>', strpos($input, '<')) !== false) {
        $posA = strpos($input, '<');
        $posB = strpos($input, '>', $posA);
        for ($i = $posA+1; $i < $posB; $i++) {
            if($input[$i] == '<'){
                $cmd = '';
            }else{
                $cmd .= $input[$i];
            }
        }
        if (validCommand($cmd, 'dishes')) {
            for($d = 0; $d < strlen($cmd); $d++){
                if (ord($cmd[$d]) >= 48 && ord($cmd[$d]) <= 57)
                $choreList['doingDishes'] += intval($cmd[$d]);
                $choreList['totalTime'] += intval($cmd[$d]);
            }
        }
    } // cleaning the house
    elseif (strpos($input, '[') !== false && strpos($input, ']', strpos($input, '[')) !== false) {
        $posA = strpos($input, '[');
        $posB = strpos($input, ']', $posA);
        for ($i = $posA+1; $i < $posB; $i++) {
            if($input[$i] == '['){
                $cmd = '';
            }else{
                $cmd .= $input[$i];
            }
        }
        if (validCommand($cmd, 'house')) {
            for($d = 0; $d < strlen($cmd); $d++){
                if (ord($cmd[$d]) >= 48 && ord($cmd[$d]) <= 57)
                    $choreList['cleaningHouse'] += intval($cmd[$d]);
                    $choreList['totalTime'] += intval($cmd[$d]);
            }
        }
        // doing the laundry
    } elseif (strpos($input, '{') !== false && strpos($input, '}', strpos($input, '{')) !== false) {
        $posA = strpos($input, '{');
        $posB = strpos($input, '}', $posA);
        for ($i = $posA+1; $i < $posB; $i++) {
            $cmd .= $input[$i];
        }
        for($d = 0; $d < strlen($cmd); $d++){
            if (ord($cmd[$d]) >= 48 && ord($cmd[$d]) <= 57)
                $choreList['doingLaundry'] += intval($cmd[$d]);
                $choreList['totalTime'] += intval($cmd[$d]);
        }
    }
}

printf('Doing the dishes - %d min.'.PHP_EOL, $choreList['doingDishes']);
printf('Cleaning the house - %d min.'.PHP_EOL, $choreList['cleaningHouse']);
printf('Doing the laundry - %d min.'.PHP_EOL, $choreList['doingLaundry']);
printf('Total - %d min.', $choreList['totalTime']);