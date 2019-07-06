<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/7/2018
 * Time: 22:19 PM
 */

$sequence = array_map('strrev', explode(' ', readline()));

echo array_sum(array_map('intval',$sequence));

