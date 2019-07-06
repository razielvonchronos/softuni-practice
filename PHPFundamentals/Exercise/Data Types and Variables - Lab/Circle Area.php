<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/28/2018
 * Time: 12:20 PM
 */

$r = doubleval(readline());

$area = ($r* pi()) * $r;

printf("%0.12f", $area);