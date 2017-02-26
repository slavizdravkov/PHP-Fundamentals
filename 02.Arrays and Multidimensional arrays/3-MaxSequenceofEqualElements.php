<?php
$inputArray = array_map('intval', explode(' ', fgets(STDIN)));
$repeatedElement = $inputArray[0];
$maxLength = 1;
$bestStart = $inputArray[0];
$countOfArray = count($inputArray);
$len = 1;
for ($i = 1; $i < $countOfArray; $i++) {
    if ($inputArray[$i] === $repeatedElement){
        $len++;
        $repeatedElement = $inputArray[$i];
        if ($maxLength < $len){
            $maxLength = $len;
            $bestStart = $inputArray[$i];
        }
    } else {
        $len = 1;
        $repeatedElement = $inputArray[$i];
    }
}
for ($i = 0; $i < $maxLength; $i++) {
    echo $bestStart . " ";
}