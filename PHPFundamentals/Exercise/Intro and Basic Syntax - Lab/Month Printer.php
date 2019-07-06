<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 10/27/2018
 * Time: 17:03 PM
 */

$month = intval(readline());

switch($month){
    case 1:
        $result = "January";
        break;
    case 2:
        $result = "February";
        break;
    case 3:
        $result = "March";
        break;
    case 4:
        $result = "April";
        break;
    case 5:
        $result = "May";
        break;
    case 6:
        $result = "June";
        break;
    case 7:
        $result = "July";
        break;
    case 8:
        $result = "August";
        break;
    case 9:
        $result = "September";
        break;
    case 10:
        $result = "October";
        break;
    case 11:
        $result = "November";
        break;
    case 12:
        $result = "December";
        break;
    default:
        $result = "Error!";
        break;
}

echo $result;