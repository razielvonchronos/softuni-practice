<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/7/2018
 * Time: 00:54 AM
 */

$train = array_map('intval', explode(' ', readline()));
$capacity = intval(readline());

while(true) {
    $tempArray = [];
    $input = explode(' ', readline());
    if ($input[0] == 'end') {
        break;
    } elseif ($input[0] == 'Add') {
        $tempArray = $train;
        $tempArray[] = intval($input[1]);

    } else {
        $tempArray = $train;
        $passengers = intval($input[0]);
        for($i = 0; $i < count($tempArray); $i++){
            if (($tempArray[$i] + $passengers) <= $capacity) {
                $tempArray[$i] += $passengers;
                break;
            }
        }
    }
    $train = $tempArray;
}
echo implode(' ', $train);
