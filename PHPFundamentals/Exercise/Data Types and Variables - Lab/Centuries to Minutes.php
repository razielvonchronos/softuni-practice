<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/28/2018
 * Time: 12:30 PM
 */

$centuries = intval(readline());

$years = $centuries * 100;
$days = $years * 365.2422;
$hours  = round($days) * 24;
$minutes  = $hours * 60;

printf("%s centuries = %s years = %s days = %s hours = %s minutes", $centuries, $years, round($days), $hours, $minutes);