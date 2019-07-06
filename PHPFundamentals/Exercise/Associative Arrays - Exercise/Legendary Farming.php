<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/10/2018
 * Time: 15:39 PM
 */

$materials = ['key' => ['shards' => 0,'fragments' => 0,'motes' => 0], 'junk' => []];

function printMaterials(array $inventory){

    ksort($inventory['key']);

    uasort($inventory['key'], function ($a, $b){
        if($a == $b){
            return 0;
        }else{
            return $a > $b ? -1 : 1;
        }
    });

    ksort($inventory['junk']);
    foreach ($inventory as $type => $loot) {
        foreach ($loot as $name => $amount) {
            printf('%s: %d' . PHP_EOL, $name, $amount);
        }
    }
}

while(true){
    $loot = explode(' ', readline());
//$loot = explode(' ', "3 Motes 5 stones 5 Shards 6 leathers 255 fragments 7 Shards");

    for ($i = 0; $i < count($loot); $i++) {
        $amount = intval($loot[$i]);
        $material = strtolower($loot[$i + 1]);
        if ($material == "shards" || $material == "fragments" || $material == "motes") {
            if (!array_key_exists($material, $materials['key'])) {
                $materials['key'] [$material] = 0;
            }
            $materials['key'][$material] += $amount;
            if ($materials['key'][$material] >= 250) {
                $materials['key'][$material] -= 250;
                if ($material == "shards") {
                    echo 'Shadowmourne obtained!' . PHP_EOL;
                }
                if ($material == "fragments") {
                    echo 'Valanyr obtained!' . PHP_EOL;
                }
                if ($material == "motes") {
                    echo 'Dragonwrath obtained!' . PHP_EOL;
                }
                printMaterials($materials);
                exit();
            }
        } else {
            if (!array_key_exists($material, $materials['junk'])) {
                $materials['junk'] [$material] = 0;
            }
            $materials['junk'][$material] += $amount;
        }
        $i++;
    }
}
