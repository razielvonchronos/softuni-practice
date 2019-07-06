<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/12/2018
 * Time: 20:56 PM
 */

$forceBook = array();

function openForceBook(array $forceBook)
{
    ksort($forceBook);
    uksort($forceBook, function ($a, $b) use (&$forceBook) {
        if(count($forceBook[$a]) == count($forceBook[$b])) {
                return 0;
        } else {
            return count($forceBook[$a]) > count($forceBook[$b]) ? -1 : 1;
        }
    });

    foreach ($forceBook as $side => $users) {
        if (count($users) > 0) {
            printf('Side: %s, Members: %d' . PHP_EOL, $side, count($users));
        }
        asort($users);
        foreach ($users as $user) {
            print '! ' . $user . PHP_EOL;
        }
    }
}

function validateUser($username,$forceBook): bool{
    $valid = true;
    foreach($forceBook as $team => $users){
        if(in_array($username, $users)){
            $valid = false;
        }
    }
    return $valid;
}

while (true) {
    $input = readline();
    if ($input == 'Lumpawaroo') {
        openForceBook($forceBook);
        break;
    } elseif (in_array("|", explode(' ', $input))) {
        list($side, $user) = explode(' | ', $input);
        if (!array_key_exists($side, $forceBook)) {
            $forceBook[$side] = [];
        }
        if (validateUser($user, $forceBook)) {
            $forceBook[$side][] = $user;
        }
    } elseif (in_array("->", explode(' ', $input))) {
        list($user, $side) = explode(' -> ', $input);
        if (!array_key_exists($side, $forceBook)) {
            $forceBook[$side] = [];
        }
        foreach ($forceBook as $forceSide => $users) {
            if ($side != $forceSide) {
                if (in_array($user, $users)) {
                    array_splice($forceBook[$forceSide], array_search($user, $users), '1');
                } else {
                    break;
                }
            }
        }
        if (!in_array($user, $forceBook[$side])) {
            $forceBook[$side][] = $user;
            printf("%s joins the %s side!" . PHP_EOL, $user, $side);
        }
    }
}
