<?php

$string =explode(' ',  readline());
$result = [];

for ($b = count($string) - 1; $b >= 0; $b--) {
    $result[] = $string[$b];
}

print implode(' ', $result);