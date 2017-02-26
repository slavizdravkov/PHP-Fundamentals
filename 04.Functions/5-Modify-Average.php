<?php
function averageOfDigits(array $arrayOfDigits) {
    $averageSum = 0;
    $count = count($arrayOfDigits);
    foreach ($arrayOfDigits as $digit) {
        $averageSum += $digit;
    }
    return $averageSum / $count;
}
$inputString = trim(fgets(STDIN));
$inputArray = array_map('intval', str_split($inputString));
//var_dump($inputArray);
$average = averageOfDigits($inputArray);
while ($average < 5){
    $inputArray[] = 9;
    $average = averageOfDigits($inputArray);
}
$outputString = implode($inputArray);
echo $outputString;