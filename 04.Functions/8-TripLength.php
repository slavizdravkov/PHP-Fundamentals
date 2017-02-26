<?php
function distanceBetweenPoints($x1, $y1, $x2, $y2){
    $distanceX = $x2 - $x1;
    $distanceY = $y2 - $y1;
    $distance = sqrt(pow($distanceX, 2) + pow($distanceY, 2));
    return $distance;

}

function coordToArrayOfPoints(array $inputData){
    $arrayOfCoordinates = [];
    for ($i = 0; $i < count($inputData); $i += 2) {
        $arrayOfCoordinates[] = array($inputData[$i], $inputData[$i + 1]);
    }
    return $arrayOfCoordinates;
}

function generateOutpString(array $inputData){
    asort($inputData);
    $arrayOfKeys = array_keys($inputData);
    $arrayOfValues = array_values($inputData);
    $sum = $arrayOfValues[0] + $arrayOfValues[1];
    $key1 = $arrayOfKeys[0];
    $key2 = $arrayOfKeys[1];
    if (($key1 === 1 && $key2 === 2) || ($key1 === 2 && $key2 === 1)){
        return "1->2->3: {$sum}";
    } else if (($key1 === 2 && $key2 === 3) || ($key1 === 3 && $key2 === 2)){
        return "1->3->2: {$sum}";
    } else {
        return "2->1->3: {$sum}";
    }
}

$inputCoordinates = array_map('floatval', explode(', ', fgets(STDIN)));
//$inputCoordinates = [0, 0, 2, 0, 4, 0];
$arrayOfCoordinates = coordToArrayOfPoints($inputCoordinates);
$outputArray = [];
for ($i = 1; $i <= 3; $i++) {
    if ($i < 3){
        $x1 = $arrayOfCoordinates[$i - 1][0];
        $y1 = $arrayOfCoordinates[$i - 1][1];
        $x2 = $arrayOfCoordinates[$i][0];
        $y2 = $arrayOfCoordinates[$i][1];
        $outputArray[$i] = distanceBetweenPoints($x1, $y1, $x2, $y2);
    } else {
        $x1 = $arrayOfCoordinates[$i - 1][0];
        $y1 = $arrayOfCoordinates[$i - 1][1];
        $x2 = $arrayOfCoordinates[0][0];
        $y2 = $arrayOfCoordinates[0][1];
        $outputArray[$i] = distanceBetweenPoints($x1, $y1, $x2, $y2);
    }
}
$output = generateOutpString($outputArray);
echo $output;
