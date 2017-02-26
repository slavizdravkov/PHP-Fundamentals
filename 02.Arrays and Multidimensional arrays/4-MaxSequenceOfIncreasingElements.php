<?php
$inputArray = array_map('intval', explode(' ', fgets(STDIN)));
//$inputArray = [3, 2, 3, 4, 2, 2, 4];
$arrayElement = $inputArray[0];
$maxLength = 1;
$len = 1;
$startOfSequence = 0;
$tempSequence = 0;
for ($i = 1; $i < count($inputArray); $i++) {
    if ($inputArray[$i] > $arrayElement){
        $tempSequence = $i - $len;
        $len++;
        $arrayElement = $inputArray[$i];
        if ($maxLength < $len){
            $maxLength = $len;
            $startOfSequence = $tempSequence;
        }
    } else {
        $len = 1;
        $arrayElement = $inputArray[$i];
    }
}
for ($i = 0; $i < $maxLength; $i++) {
    echo $inputArray[$i + $startOfSequence] . " ";
}
