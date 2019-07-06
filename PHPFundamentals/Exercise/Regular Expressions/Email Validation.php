<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 22-Nov-18
 * Time: 04:09 AM
 */

$input = readline();
$regex_result = preg_match_all('/[A-Za-z1-9]+[@]+[a-zA-Z]+[.]+[a-zA-Z]+/', $input, $match);

print implode(' ', $match[0]);