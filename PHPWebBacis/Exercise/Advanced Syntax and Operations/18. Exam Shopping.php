<?php

$inventory = [];

/**
 * @param array $inventory
 * @param string $product
 * @param int $quantity
 */
function Stock(array &$inventory, string $product, int $quantity)
{
    array_key_exists($product, $inventory) ? $inventory[$product] += $quantity : $inventory[$product] = $quantity;
}

/**
 * @param array $inventory
 * @param string $product
 * @param int $quantity
 */
function Buy(array &$inventory, string $product, int $quantity): void
{
    $exists = array_key_exists($product, $inventory);
    if (!$exists) {
        printf('%s doesn\'t exist' . PHP_EOL, $product);
        return;
    }
    if ($inventory[$product] > 0) {
        $inventory[$product] >= $quantity ? $inventory[$product] -= $quantity : $inventory[$product] -= $inventory[$product];
        return;
    }
    printf('%s out of stock' . PHP_EOL, $product);
}

while (true) {

    $input = readline();
    if ($input == "shopping time")
        break;

    list($cmd, $product, $quantity) = explode(' ', $input);
    if ($cmd == "stock")
        Stock($inventory, $product, $quantity);
}
while (true) {

    $input = readline();
    if ($input == "exam time")
        break;

    list($cmd, $product, $quantity) = explode(' ', $input);
    if ($cmd == "buy")
        Buy($inventory, $product, $quantity);
}

foreach ($inventory as $product => $quantity)
    if ($quantity > 0)
        printf('%s -> %d' . PHP_EOL, $product, $quantity);