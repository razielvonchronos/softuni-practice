<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 03-Dec-18
 * Time: 00:19 AM
 */


$dictionary = [];

$lineOne = readline();
$pairs = explode(' | ', $lineOne);

foreach ($pairs as $pair) {
    list($word, $description) = explode(': ', $pair);
    $dictionary[$word][] = $description;
}

$wordsToList = explode(' | ', readline());

$cmd = readline();

ksort($dictionary);
foreach ($dictionary as $word => $descriptions) {
    uasort($descriptions, function ($a, $b) {
        $strlen_a = strlen($a);
        $strlen_b = strlen($b);
        if($strlen_a == $strlen_b) {
            return 0;
        } else {
            return $strlen_a > $strlen_b ? -1 : 1;
        }
    });

    if ($cmd == "End") {
        if(in_array($word,$wordsToList)){
            print $word . PHP_EOL;
            foreach ($descriptions as $key => $description) {
                print " -" . $description . PHP_EOL;
            }
        }

    } elseif ($cmd == "List") {
        print $word . " ";
    }
}