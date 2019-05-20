<?php
$input = strtolower(readline());

for ($i = 0; $i < mb_strlen($input); $i++) {
    $letter = $input[$i];
    $index = ord($letter) - 97;
    printf('%s -> %d'.PHP_EOL, $letter, $index);
}