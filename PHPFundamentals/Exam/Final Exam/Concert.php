<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 12/16/2018
 * Time: 09:29 AM
 */

$input = readline();

$concertData = [];
$playedTime = [];

while(true){
    if($input == 'start of concert'){
        break;
    }
    list($command, $bandName, $data) = explode('; ', $input);

    if($command == 'Add'){
        $bandMembers = explode(', ', $data);
        if(!array_key_exists($bandName, $concertData)){
            $concertData[$bandName] = [];
        }
        $bandMembers = explode(', ', $data);
        foreach ($bandMembers as $k => $member){
            if(!in_array($member, $concertData[$bandName])){
                $concertData[$bandName][] = $member;
            }
        }
    }elseif($command == "Play"){
        if(!array_key_exists($bandName,$playedTime)){
            $playedTime[$bandName] = $data;
        }else{
            $playedTime[$bandName] += $data;
        }
    }
    $input = readline();
}

$bandToShow = readline();
function calculateTotalTime($playedTime): int{
    $time = 0;
    foreach ($playedTime as $k => $v){
        $time += $v;
    }
    return $time;
}

printf('Total time: %d'.PHP_EOL, calculateTotalTime($playedTime));

uksort($playedTime, function($a,$b) use (&$playedTime){
    $timeA = $playedTime[$a];
    $timeB = $playedTime[$b];
    if($timeA == $timeB){
        return $a<=>$b;
    }else{
        return $timeA > $timeB ? -1 : 1;
    }
});

foreach ($playedTime as $k => $v){
    printf('%s -> %d'.PHP_EOL, $k, $v);
}

foreach ($concertData as $band => $members){
    if($bandToShow == $band){
        print $band.PHP_EOL;
        foreach($members as $id => $member){
            print '=> '.$member.PHP_EOL;
        }
    }
}
//var_dump($concertData);
//var_dump($playedTime);