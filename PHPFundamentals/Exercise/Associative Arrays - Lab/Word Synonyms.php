<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 29-Nov-18
 * Time: 02:21 AM
 */

$n = intval(readline());
$array = [];

for ($i = 0; $i < $n; $i++) {

    $word = readline();
    $synonym = readline();
    $array[$word][] = $synonym;
}
uksort($array, function ($a, $b) use($array){
    $count_a = count($array[$a]);
    $count_b = count($array[$b]);
    if($count_a == $count_b){
        return $a <=> $b;
    }else{
        return $count_a > $count_b ? -1 : 1;
    }
});

foreach ($array as $word => $synonyms) {
    printf('%s - %s' . PHP_EOL, $word, implode(', ', $synonyms));
}

