<?php
function isInside($inpX, $inpY, $inpZ):bool {
    $xMin = 10.0;
    $xMax = 50.0;
    $yMin = 20.0;
    $yMax = 80.0;
    $zMin = 15.0;
    $zMax = 50.0;
    if ($inpX >= $xMin && $inpX <= $xMax){
        if ($inpY >= $yMin && $inpY <= $yMax){
            if ($inpZ >= $zMin && $inpZ <= $zMax){
                return true;
            }
        }
    }
    return false;
}
$inputString = trim(fgets(STDIN));
$inputArray = array_map('floatval', explode(', ', $inputString));
for ($i = 0; $i < count($inputArray); $i += 3) {
    $x = $inputArray[$i];
    $y = $inputArray[$i + 1];
    $z = $inputArray[$i + 2];
    if (isInside($x, $y, $z)){
        echo "inside\n";
    } else {
        echo "outside\n";
    }
}