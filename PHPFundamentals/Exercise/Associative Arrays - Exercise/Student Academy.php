<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/9/2018
 * Time: 10:05 AM
 */

$n = intval(readline());
$students = [];
$student = null;

for($i = 1;$i <= $n;$i++){
    $student = readline();
    $grade = readline();

    if(!array_key_exists($student,$students)){
        $students[$student] = [];
    }
    $students[$student][] = doubleval($grade);
}

uksort($students, function ($a,$b) use($students){
    $grade_a = array_sum($students[$a]) / count($students[$a]);
    $grade_b = array_sum($students[$b]) / count($students[$b]);

    if($grade_a == $grade_b){
        return 0;
    }else{
        return $grade_a > $grade_b ? -1 : 1;
    }
});

foreach ($students as $student => $grade){
    $grade = round(array_sum($grade) / count($grade),2);
    if($grade >= 4.50){
        printf('%s -> %0.2f'.PHP_EOL, $student, $grade);
    }
}


//var_dump($students);