<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 14-Dec-18
 * Time: 23:32 PM
 */

$daysTotal = intval(readline());
$numberUsers = intval(readline());
$moneyPerSearch = doubleval(readline());
$moneyEarned = 0.0;

for($i = 1; $i <= $numberUsers;$i++){
    $moneyFromSearch = 0.0;
    $wordsSearched = intval(readline());
    // If the words a user uses are greater than 5, we ignore the search and we do not calculate the money from it
    if($wordsSearched <= 5){
        //If the search contains only one word, the money from the search are doubled
        $moneyFromSearch += $moneyPerSearch;
        if($wordsSearched == 1){
            $moneyFromSearch *= 2;
        }
    }
    // Money made by each third user are tripled.
    if($i % 3 == 0) {
        $moneyFromSearch *= 3;
    }
    // add the money generated from search to total income
    $moneyEarned +=  $moneyFromSearch * $daysTotal;
}

printf('Total money earned for %d days: %0.2f', $daysTotal, $moneyEarned);