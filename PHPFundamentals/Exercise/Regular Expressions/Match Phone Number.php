<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 22-Nov-18
 * Time: 04:35 AM
 */

$input = '359-2-222-2222, +359/2/222/2222, +359-2 222 2222
+359 2-222-2222, +359-2-222-222, +359-2-222-22222 +359 2 222 2222
+359-2-222-2222';

//$input = readline();
$pattern = '/[+][359]+[-]+[2]+[-]+\d{3}[-]+\d{4}$/';
$regex_result = preg_match_all($pattern, $input, $match);

var_dump($match);