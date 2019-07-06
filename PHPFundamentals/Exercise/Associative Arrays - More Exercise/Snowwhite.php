<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 09-Dec-18
 * Time: 21:48 PM
 */

$input = readline();

$dwarfData = [];

function countHats($dwarfData, $color): int{
    $count = 0;
    foreach($dwarfData as $id => $dwatf){
        if($dwatf['color'] == $color)
            $count++;
    }
    return $count;
}

while($input != "Once upon a time"){
    list($name, $color, $physics) = explode(' <:> ', $input);
    $id = array_search($name, array_column($dwarfData, 'name'));
        if($id === false){
            $dwarfData[] = array('name' => $name, 'color'=> $color, 'physics' => intval($physics));
        }else{
            if($dwarfData[$id]['color'] == $color){
                if($dwarfData[$id]['physics'] < $physics){
                    $dwarfData[$id]['physics'] = $physics;
                }
            }else{
                $dwarfData[] = array('name' => $name, 'color'=> $color, 'physics' => intval($physics));
            }
        }

    $input = readline();
}

uksort($dwarfData, function($a,$b) use($dwarfData){
    $dwarfPhysics_a = $dwarfData[$a]['physics'];
    $dwarfPhysics_b = $dwarfData[$b]['physics'];
    $dwarfColorCount_a = countHats($dwarfData,$dwarfData[$a]['color']);
    $dwarfColorCount_b = countHats($dwarfData,$dwarfData[$b]['color']);
    if($dwarfPhysics_a == $dwarfPhysics_b){
        if($dwarfColorCount_a == $dwarfColorCount_b){
            return 0;
        }else{
            return $dwarfColorCount_a > $dwarfColorCount_b ? -1 : 1;
        }
    }else{
        return $dwarfPhysics_a > $dwarfPhysics_b ? -1 : 1;
    }
});

//var_dump($dwarfData);

foreach($dwarfData as $key => $dwarf){
    printf('(%s) %s <-> %d'.PHP_EOL, $dwarf['color'], $dwarf['name'], $dwarf['physics']);
}