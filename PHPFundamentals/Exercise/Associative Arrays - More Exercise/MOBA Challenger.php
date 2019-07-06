<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 06-Dec-18
 * Time: 01:40 AM
 */

$input = readline();
$mobaChallenge = [];

function calculateTotalSkill($playerData): int{
    $skill = 0;
    foreach ($playerData as $k => $v){
        $skill += $v;
    }

    return $skill;
}

function duelValid($playerA, $playerB, $mobaChallenge){
    $valid = false;
    foreach($mobaChallenge[$playerA] as $positionA => $skillA){
        if(array_key_exists($positionA, $mobaChallenge[$playerB])){
            $valid = true;
        }
    }
    return $valid;
}

while($input != "Season end"){
    $cmd = explode(' ', $input);
    if($cmd[1] == "->"){ // set player position and skill
        $playerAction = explode(' -> ', $input);
        list($player, $position,$skill) = $playerAction;
        if(!array_key_exists($player,$mobaChallenge)){
            $mobaChallenge[$player][$position] = intval($skill);
        }else{
            if(!array_key_exists($position,$mobaChallenge[$player])){
                $mobaChallenge[$player][$position] = intval($skill);
            }else{
                if($mobaChallenge[$player][$position] < $skill){
                    $mobaChallenge[$player][$position] = $skill;
                }
            }
        }

    }else{ // player vs player
        $playerAction = explode(' vs ', $input);
        list($playerChallenger, $playerTarget) = $playerAction;
        // both players exist
        if(array_key_exists($playerChallenger,$mobaChallenge) && array_key_exists($playerTarget,$mobaChallenge)){
            $skillChallenger = calculateTotalSkill($mobaChallenge[$playerChallenger]) ;
            $skillTarget = calculateTotalSkill($mobaChallenge[$playerTarget]) ;
            //if they got at least one in common
            if(duelValid($playerChallenger,$playerTarget, $mobaChallenge)){
                if($skillChallenger > $skillTarget){
                    //printf('%s(%d) defeated %s(%d)'.PHP_EOL,$playerChallenger, $skillChallenger,$playerTarget, $skillTarget);
                    unset($mobaChallenge[$playerTarget]);
                }
                elseif($skillChallenger < $skillTarget){
                    //printf('%s(%d) defeated %s(%d)'.PHP_EOL,$playerTarget, $skillTarget,$playerChallenger, $skillChallenger);
                    unset($mobaChallenge[$playerChallenger]);
                }
            }

        }
    }
    $input = readline();
}


uksort($mobaChallenge, function($a,$b) use(&$mobaChallenge){
    $skill_a = calculateTotalSkill($mobaChallenge[$a]);
    $skill_b = calculateTotalSkill($mobaChallenge[$b]);
    if($skill_a == $skill_b){
        return $a<=>$b;
    }else{
        return $skill_a > $skill_b ? -1 : 1;
    }
});

foreach ($mobaChallenge as $player => $data){
        printf('%s: %d skill'.PHP_EOL, $player, calculateTotalSkill($data));
        uksort($data, function($a,$b) use($data){
        $skill_a = $data[$a];
        $skill_b = $data[$b];
        if($skill_a == $skill_b){
            return $a<=>$b;
        }else{
            return $skill_a > $skill_b ? -1 : 1;
        }
        });
    foreach ( $data as $position => $skill){
        printf('- %s <::> %d'.PHP_EOL, $position, $skill);
    }
}

//var_dump($mobaChallenge);