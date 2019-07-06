<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 15-Dec-18
 * Time: 03:27 AM
 */
$chatLog = [];

while(true){
    $input = readline();
    if($input == 'end'){
        break;
    }
    $line = explode(' ', $input);
    $cmd = $line[0];
    if($cmd == 'Chat'){
        $args = $line[1];
        $chatLog[] = $args;
    }elseif($cmd == 'Delete'){
        $args = $line[1];
        $msgId = array_search($args, $chatLog);
        if($msgId !== false){
            array_splice($chatLog, $msgId, 1);
        }
    }elseif($cmd == 'Edit'){
        $target = $line[1];
        $replacement = $line[2];
        $msgId = array_search($target, $chatLog);
            if($msgId !== false){
            array_splice($chatLog, $msgId, 1, $replacement);
        }
    }elseif($cmd == 'Pin'){
        $target = $line[1];
        $msgId = array_search($target, $chatLog);
            if($msgId !== false){
                $msg = $chatLog[$msgId];
                array_splice($chatLog, $msgId, 1);
                array_push($chatLog, $msg);
        }
    }elseif($cmd == 'Spam'){
        for($i = 1; $i < count($line); $i++)
            array_push($chatLog, $line[$i]);
    }
}

print implode(''.PHP_EOL, $chatLog);