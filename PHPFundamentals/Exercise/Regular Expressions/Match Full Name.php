<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 22-Nov-18
 * Time: 02:28 AM
 */

//$input = 'Ivan Ivanov, Ivan ivanov, ivan Ivanov, IVan Ivanov, Test Testov, Ivan	Ivanov';

$input = readline();
$regex_result = preg_match_all('/\b[A-Z][a-z]{1,}+ [A-Z][a-z]{1,}+\b/', $input, $match);

print implode(' ', $match[0]);