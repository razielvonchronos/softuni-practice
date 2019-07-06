<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/12/2018
 * Time: 20:11 PM
 */

$products = array();
while (true) {
    $input = readline();

    if ($input == 'buy') {
        break;
    }

    list($product, $price, $quantity) = explode(' ', $input);

    if (!array_key_exists($product, $products)) {
        $products[$product]['price'][] = 0;
        $products[$product]['quantity'][] = 0;

    }
    $products[$product]['price'][0] = doubleval($price);
    $products[$product]['quantity'][0] += intval($quantity);
}

function productsSum(array $array): float
{
    $sum = 0;
    for ($i = 0; $i < count($array['quantity']); $i++) {
        $sum += $array['quantity'][$i] * $array['price'][$i];
    }
    return $sum;
}

foreach ($products as $product => $productInfo) {
    printf('%s -> %0.2f' . PHP_EOL, $product, productsSum($productInfo));
}

//var_dump($products);