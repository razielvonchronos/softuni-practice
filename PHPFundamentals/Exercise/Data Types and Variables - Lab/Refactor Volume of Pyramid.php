<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/31/2018
 * Time: 03:15 AM
 */

echo "Length: ";
$length = floatval(readline());
echo "Width: ";
$width = floatval(readline());
echo "Height: ";
$height = floatval(readline());
$volumeTotal = ($length * $width * $height) / 3;
echo sprintf("Pyramid Volume: %.2f", $volumeTotal) . PHP_EOL;
