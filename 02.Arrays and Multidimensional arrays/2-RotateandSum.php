<?php
$inputArray = explode(" ", fgets(STDIN));
$timesToRotated = intval(fgets(STDIN));
$countOfElements = count($inputArray);
$lastElement = "";
$finalArray = [];
$arrayOfSum = [];
for ($i = 0; $i < $timesToRotated; $i++){
    //$finalArray[$i] = [];
    $lastElement = $inputArray[$countOfElements - 1];
    array_splice($inputArray, $countOfElements - 1, 1);
    array_splice($inputArray, 0, 0, $lastElement);
    $finalArray[$i] = $inputArray;
}
for ($i = 0; $i <= $countOfElements - 1; $i++){
    $sum = 0;
    for ($j = 0; $j < $timesToRotated; $j++){
        $sum += intval($finalArray[$j][$i]);
        $arrayOfSum[$i] = $sum;
    }
}
$outputString = "";
foreach ($arrayOfSum as $item) {
    $outputString .= "{$item} ";
}

echo $outputString;
//print_r($finalArray);
//print_r($arrayOfSum);