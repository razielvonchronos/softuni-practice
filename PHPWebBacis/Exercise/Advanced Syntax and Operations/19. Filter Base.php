<?php

$Employees = [];

/**
 * @param array $Employees
 * @param string $input_type
 * @param string $name
 * @param int $value
 */
function InsertEmployee(array &$Employees, string $input_type, string $name, string $value)
{
    $Employees[$input_type][$name] = $value;
}

function input_type(string $value): ?string
{
    $type = null;
    // doesn't have a floating point
    $is_int = intval($value) == $value;
    if ($is_int)
        $type = 'Age';
    // has a floating point
    $is_float = preg_match('/[\.]+/mu', $value, $matches);
    if ($is_float)
        $type = 'Salary';
    // if doesn't find any digits, it is a string
    $is_string = !preg_match('/[\d]+/mu', $value, $matches);
    if ($is_string)
        $type = 'Position';
    return $type;
}

while (true) {

    $input = readline();
    if ($input == "filter base")
        break;

    list($name, $value) = explode(' -> ', $input);
    $type = input_type($value);
    InsertEmployee($Employees, $type, $name, $value);
}

$input2 = readline();

if (!array_key_exists($input2, $Employees)) {
//    printf("Key %s doesn't exist" . PHP_EOL, $input2);
    exit();
}

foreach ($Employees[$input2] as $name => $data) {
    printf("Name: %s" . PHP_EOL, $name);
    if(input_type($data) == 'Salary' )
    {
        printf("%s: %0.2f" . PHP_EOL, $input2, $data);
    }
    else
    {
        printf("%s: %s" . PHP_EOL, $input2, $data);
    }
    printf("====================" . PHP_EOL);
}