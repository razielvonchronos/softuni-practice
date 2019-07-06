<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/10/2018
 * Time: 14:44 PM
 */
$companies = [];

function showResults(array $companies){
    ksort($companies);
    foreach ($companies as $company => $employees){
        printf("%s".PHP_EOL, $company);
        foreach($employees as $key => $employee){
            printf("-- %s".PHP_EOL, $employee);
        }
    }
}

while (true) {
    $input = readline();
    if($input == 'End') {
        showResults($companies);
        exit;
    }
    list($company, $employee) = explode(' -> ', $input);

    if(!array_key_exists($company,$companies)){
        $companies[$company] = [];
    }
    if(!in_array($employee, $companies[$company])){
        $companies[$company][]= $employee;
    }
}
