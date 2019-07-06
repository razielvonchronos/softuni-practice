<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/19/2018
 * Time: 16:03 PM
 */

$dir = readline();
//$dir = 'C:\Internal\training-internal\name.html.docx';

$file = substr($dir,strrpos($dir, chr(92)));
$name = substr($file, 1, strrpos($file, '.')-1);
$ext = substr($file, strrpos($file, '.')+1);

echo 'File name: '.$name.PHP_EOL;
echo 'File extension: '.$ext.PHP_EOL;