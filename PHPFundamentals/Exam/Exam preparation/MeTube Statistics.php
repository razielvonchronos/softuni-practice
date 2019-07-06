<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 15-Dec-18
 * Time: 18:30 PM
 */

$MeTube = [];

while(true){
    $input = readline();
    if($input == 'stats time'){
        break;
    }

    $videoAdd = explode('-', $input);
    if(count($videoAdd) > 1){
        list($name, $views) = $videoAdd;
        if(!array_key_exists($name,$MeTube)){
            $MeTube[$name] = ['views' => $views, 'likes' => 0];
        }else{
            $MeTube[$name]['views'] += $views;
        }
    }
    $videoRating = explode(':', $input);
    if(count($videoRating) > 1){
        list($cmd, $name) = $videoRating;
        if(array_key_exists($name,$MeTube)){
            if($cmd == 'like'){
                $MeTube[$name]['likes'] += 1;
            }elseif($cmd == 'dislike'){
                $MeTube[$name]['likes'] -= 1;
            }
        }
    }
}

$order = readline();
if($order == "by views"){
    uksort($MeTube, function($a,$b) use ($MeTube){
        $viewsA = $MeTube[$a]['views'];
        $viewsB = $MeTube[$b]['views'];
        if($viewsA == $viewsB){
            return 0;
        }else{
            return $viewsA > $viewsB ? -1 : 1;
        }
    });
}else{
    uksort($MeTube, function($a,$b) use ($MeTube){
        $likesA = $MeTube[$a]['likes'];
        $likesB = $MeTube[$b]['likes'];
        if($likesA == $likesB){
            return 0;
        }else{
            return $likesA > $likesB ? -1 : 1;
        }
    });
}

foreach ($MeTube as $video => $data){
    printf('%s - %d views - %d likes'.PHP_EOL, $video, $data['views'], $data['likes']);
}