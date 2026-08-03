<?php
function array2hash_sorted($array) {
    if (count($array) == 0)
        return null;
	$new_array = [];
    //redmerrar de zero jusqu'a ce qu'il ne reste plus rien
    while (count($array)) {
        $max = $array[0];
        $index = 0;
        for ($j = 0; $j < count($array); $j++){
            if ($max < $array[$j]) {
                $max = $array[$j];
                $index = $j;
            }
        }
        $new_array[$max[0]] = $max[1];
        array_splice($array, $index, 1);
    }
    return $new_array;
}
?>