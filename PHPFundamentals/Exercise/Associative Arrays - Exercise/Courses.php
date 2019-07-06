<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/9/2018
 * Time: 11:02 AM
 */

$courses = [];

function showResults(array $array): void
{
    uasort($array, function ($a, $b) {
        return count($a) < count($b);
    }
    );
    foreach ($array as $module => $students) {
        printf('%s: %d' . PHP_EOL, $module, count($students));
        uasort($students, function ($a, $b) {
            return $a <=> $b;
        });
        foreach ($students as $student) {
            print '-- ' . $student . PHP_EOL;
        }
//        var_dump($array);
    }
}

while (true) {
    $input = explode(' : ', readline());

    if ($input[0] == 'end') {
        showResults($courses);
        exit;
    }
    if (!key_exists($input[0], $courses)) {
        $courses[$input[0]] = [];
    }
    if (!in_array($input[1], $courses[$input[0]])) {
        $courses[$input[0]][] = $input[1];

    }
}