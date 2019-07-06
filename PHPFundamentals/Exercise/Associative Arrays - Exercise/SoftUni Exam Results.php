<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/12/2018
 * Time: 22:40 PM
 */

$studentData = [];

function calculateScore($submissions)
{
    $points = 0;
    foreach ($submissions as $key => $language) {
        if ($key != "banned") {
            foreach ($language as $id => $score) {
                if ($score > $points) {
                    $points = $score;
                }
            }
        }
    }
    return $points;
}

while (true) {
    $input = readline();

    if ($input == 'exam finished') {
        break;
    }

    $line = explode('-', $input);
    list($username, $language) = $line;
    if ($language == 'banned') {
        $studentData[$username][$language] = true;
    } else {
        $score = $line[2];
        if (!array_key_exists($username, $studentData)) {
            $studentData[$username] = array('banned' => false);
        }

        $studentData[$username][$language][] = intval($score);
    }

}

ksort($studentData);
uasort($studentData, function ($a, $b) {
    $score_a = calculateScore($a);
    $score_b = calculateScore($b);
    if ($score_a == $score_b) {
        return 0;
    } else {
        return $score_a > $score_b ? -1 : 1;
    }
});

print "Results:" . PHP_EOL;
foreach ($studentData as $student => $submissions) {
    if ($submissions['banned'] == false) {
        print $student . ' | ' . calculateScore($submissions) . PHP_EOL;
    }
}

$submissions = [];
print "Submissions:" . PHP_EOL;

foreach ($studentData as $student => $data_array) {
    foreach ($data_array as $language => $scores_array){
        if($language != 'banned'){
            foreach($scores_array as $id => $value){
                if(array_key_exists($language,$submissions)){
                    $submissions[$language]++;
                }else{
                    $submissions[$language] = 1;
                }
            }
        }
    }
}
krsort($submissions, SORT_NATURAL);
uksort($submissions, function ($a, $b) use(&$submissions){
    if($a == $b){
        return 0;
    }else{
        return $submissions[$a] > $submissions[$b] ? -1 : 1;
    }
});

foreach ($submissions as $language => $count) {
    printf('%s - %d' . PHP_EOL, $language, $count);
}


//var_dump($studentData);
//var_dump($submissions);