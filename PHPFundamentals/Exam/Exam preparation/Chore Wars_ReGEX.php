<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 15-Dec-18
 * Time: 15:55 PM
 */

$choreList = ['doingDishes' => 0, 'cleaningHouse' => 0, 'doingLaundry' => 0, 'totalTime' => 0];
$reDishes = '/[<][a-z0-9]+[>]/m';
$reHouse = '/[[][A-Z0-9]+[]]/m';
$reLaundry = '/[{].+[}]/m';

function calculateTime($match)
{
    $time = 0;
    for ($i = 0; $i < strlen($match); $i++)
        if (ord($match[$i]) >= 48 && ord($match[$i]) <= 57) {
            $time += $match[$i];
        }
    return $time;
}

while (true) {
    $input = readline();
    if ($input == 'wife is happy') {
        break;
    }

    if (preg_match_all($reDishes, $input, $matches)) {
        foreach ($matches[0] as $k => $v) {
            $choreList['doingDishes'] += calculateTime($v);
            $choreList['totalTime'] += calculateTime($v);
        }
    }
    if (preg_match_all($reHouse, $input, $matches)) {
        foreach ($matches[0] as $k => $v) {
            $choreList['cleaningHouse'] += calculateTime($v);
            $choreList['totalTime'] += calculateTime($v);
        }

    }
    if (preg_match_all($reLaundry, $input, $matches)) {
        foreach ($matches[0] as $k => $v) {
            $choreList['doingLaundry'] += calculateTime($v);
            $choreList['totalTime'] += calculateTime($v);
        }

    }

}

printf('Doing the dishes - %d min.' . PHP_EOL, $choreList['doingDishes']);
printf('Cleaning the house - %d min.' . PHP_EOL, $choreList['cleaningHouse']);
printf('Doing the laundry - %d min.' . PHP_EOL, $choreList['doingLaundry']);
printf('Total - %d min.', $choreList['totalTime']);