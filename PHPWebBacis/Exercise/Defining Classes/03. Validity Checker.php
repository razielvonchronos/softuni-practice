<?php

$input = readline();
list($x1,$y1,$x2,$y2) = array_map('intval', explode(', ', $input));

function validate($x1,$y1,$x2,$y2)
{
    // using Pythagorean theorem <https://en.wikipedia.org/wiki/Pythagorean_theorem>
    $a = $x1 - $x2;
    $b = $y1 - $y2;
    $result = sqrt(($a * $a) + ($b * $b));
    printf("{%d, %d} to {%d, %d} is %s".PHP_EOL, $x1, $y1, $x2, $y2, ($result == intval($result)) ? "valid" : "invalid");
}

//if the distances between each point and the start of the cartesian coordinate system (0, 0) is valid
validate($x1,$y1, 0, 0);
validate($x2,$y2, 0, 0);
//if the distances between the points themselves is valid
validate($x1,$y1, $x2, $y2);