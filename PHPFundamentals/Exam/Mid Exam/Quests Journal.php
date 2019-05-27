<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/4/2018
 * Time: 10:51 AM
 */


$journal = explode(', ', readline());

$input = readline();

while(true){
    $tempArray = [];
    if($input != 'Retire!'){
        $input = explode(' - ', $input);
        $command = $input[0];
        $quest = $input[1];
        $squest = [];
        if($command == 'Start'){
            if(!in_array($quest, $journal)){
                $tempArray = $journal;
                $tempArray[] = $quest;
            }else{
                $tempArray = $journal;
            }
        }
        if($command == 'Complete'){
            if(in_array($quest, $journal)){
                for($i = 0;$i < count($journal); $i++){
                    if($journal[$i] != $quest){
                        $tempArray[] = $journal[$i];
                    }
                }
            }else{
                $tempArray = $journal;
            }
        }
        if($command == 'Side Quest'){
            $squest = explode(':', $quest);
            $mainQuest = $squest[0];
            $sideQuest = $squest[1];
            if(in_array($mainQuest, $journal) && !in_array($sideQuest, $journal)){
                for($i = 0;$i < count($journal); $i++){
                    $tempArray[] = $journal[$i];
                    if($journal[$i] == $mainQuest)
                        $tempArray[] = $sideQuest;
                }
            }else{
                $tempArray = $journal;
            }
        }
        if($command == 'Renew'){
            if(in_array($quest, $journal)){
                for($i = 0;$i < count($journal); $i++){
                    if($journal[$i] != $quest)
                        $tempArray[] = $journal[$i];
                }
                $tempArray[] = $quest;
            }else{
                $tempArray = $journal;
            }
        }
        $journal = $tempArray;
//        var_dump($journal);
//        var_dump($tempArray);
        $input = readline();
    }else{
        break;
    }
}

echo implode(', ', $journal);