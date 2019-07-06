<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/27/2018
 * Time: 17:12 PM
 */

$country = strtolower(readline());

switch($country){
    case 'england':
    case 'usa':
        echo "English";
        break;
    case 'argentina ':
    case 'mexico':
    case 'spain':
        echo "Spanish";
        break;
    default:
        echo "unknown";
        break;
}