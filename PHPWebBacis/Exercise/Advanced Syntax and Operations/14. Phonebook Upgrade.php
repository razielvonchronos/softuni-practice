<?php

$PhoneBook = [];

function insert(array &$PhoneBook, string $name, string $phone): void
{
    $PhoneBook[$name] = $phone;
}

function find(array &$PhoneBook, string $name): ?array
{
    if (!array_key_exists($name, $PhoneBook))
        return null;
    return array($name, $PhoneBook[$name]);
}

while (true) {

    $json = null;
    $args = explode(' ', readline());
    $cmd = $args[0];

    if ($cmd == "END") {
        exit();
    }

    if ($cmd == "A")
        insert($PhoneBook, $args[1], $args[2]);

    if ($cmd == "S") {
        $result = find($PhoneBook, $args[1]);
        if ($result) {
            $json = sprintf('%s -> %s' . PHP_EOL, $result[0], $result[1]);
        } else {
            $json = sprintf('Contact %s does not exist.' . PHP_EOL, $args[1]);
        }
        print $json;
    }
    if($cmd == "ListAll")
    {
        ksort($PhoneBook, SORT_NATURAL);
        foreach($PhoneBook as $name => $phone)
        {
            $json = sprintf('%s -> %s' . PHP_EOL, $name, $phone);
            print $json;
        }
    }
}
