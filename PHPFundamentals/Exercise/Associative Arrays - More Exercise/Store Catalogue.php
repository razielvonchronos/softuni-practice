<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 06-Dec-18
 * Time: 00:31 AM
 */

$n = intval(readline());
$catalogue = [];

for($i = 0; $i < $n; $i++){
    $input = readline();

    list($name,$price) = explode(' : ', $input);
    $group = $name[0];

    if(!array_key_exists($group,$catalogue)){
        $catalogue[$group] = [];
    }

    $catalogue[$group][] = ['name' => $name, 'price' => doubleval($price)];

}
ksort($catalogue);

foreach ($catalogue as $group => $products){
    asort($products);
    print $group.PHP_EOL;
    foreach ($products as $productId => $productData){
        printf('  %s: %s'.PHP_EOL, $productData['name'], $productData['price']);
    }
}