<?php

$PhoneBook = [];

/**
 * @param array $PhoneBook
 * @param string $name
 * @param string $phone
 */
function insert(array &$PhoneBook, string $name, string $phone): void
{

    $PhoneBook[$name] = $phone;
}

while (true) {

    $json = null;
    $args = explode(' : ', readline());
    $cmd = $args[0];

    if($args[0] == "Over")
    {
        ksort($PhoneBook, SORT_NATURAL);
        foreach($PhoneBook as $name => $phone)
        {
            $json = sprintf('%s -> %s' . PHP_EOL, $name, $phone);
            print $json;
        }
        break;
    }

    $name = is_numeric($args[0]) ? $args[1] : $args[0];
    $phone = is_numeric($args[0]) ? $args[0] : $args[1];
    insert($PhoneBook, $name, $phone);
}
