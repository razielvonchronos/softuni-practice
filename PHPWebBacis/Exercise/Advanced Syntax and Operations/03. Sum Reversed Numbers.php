<?php

$input = explode(' ', readline());

$numbers = array_map('strrev', $input);

printf("%d", array_sum($numbers));
