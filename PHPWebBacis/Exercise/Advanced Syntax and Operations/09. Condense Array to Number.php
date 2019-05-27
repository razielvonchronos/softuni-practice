<?php

$nums = explode(' ', readline());

while (count($nums) > 1) {
    $condensed = [];
    for ($i = 0; $i < count($nums); $i++) {
        if (!isset($nums[$i + 1]))
            continue;
        $condensed[] = $nums[$i] + $nums[$i + 1];
    }
    $nums = $condensed;
}

print array_sum($nums);