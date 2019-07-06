<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 05-Dec-18
 * Time: 12:49 PM
 */

$input = readline();

$juice = ['order' => []];

while ($input != "End") {
    list($name, $quantity) = explode(' => ', $input);

    if (!array_key_exists($name, $juice)) {
        $juice[$name] = array();
    }
    $juice[$name][] = $quantity;
    if (array_sum($juice[$name]) >= 1000 && !in_array($name, $juice['order'])) {
        $juice['order'][] = $name;
    }
    $input = readline();

}

foreach ($juice['order'] as $id => $name) {
    $litre = intval(array_sum($juice[$name]) / 1000);
    if ($litre >= 1)
        printf('%s => %s' . PHP_EOL, $name, $litre);
}

//var_dump($juice);