<?php

$n = readline();
$cmd = explode(', ', readline());

/**
 * @param float $n
 */
function doChop(float &$n): void
{
    $n /= 2;
}

/**
 * @param float $n
 */
function doDice(float &$n): void
{
    $n = sqrt($n);
}

/**
 * @param float $n
 */
function doSpice(float &$n): void
{
    $n += 1;
}

/**
 * @param float $n
 */
function doBake(float &$n): void
{
    $n *= 3;
}

/**
 * @param float $n
 */
function doFillet(float &$n): void
{
    $n -= $n * 0.2;
}

foreach ($cmd as $action) {
    switch ($action)
    {
        case 'chop':
            doChop($n);
            break;
        case 'dice':
            doDice($n);
            break;
        case 'spice':
            doSpice($n);
            break;
        case 'bake':
            doBake($n);
            break;
        case 'fillet':
            doFillet($n);
            break;
        default:
            break;
    }
    printf('%s'.PHP_EOL, $n);
}
