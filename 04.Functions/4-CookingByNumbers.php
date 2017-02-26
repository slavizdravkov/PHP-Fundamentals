<?php
function calcChop($number){
    return $number / 2;
}

function dice($number){
    return sqrt($number);
}

function spice($number){
    return $number + 1;
}

function bake($number){
    return $number * 3;
}

function fillet($number){
    return $number - ($number * 0.2);
}

$inputLine1 = trim(fgets(STDIN));
$inputNum = intval($inputLine1);
$inputLine2 = trim(fgets(STDIN));
$listOfOperations = explode(', ', $inputLine2);
//print_r($listOfOperations);
foreach ($listOfOperations as $operation) {
    if ($operation == 'chop'){
        $command = 'calcChop';
    } else {
        $command = $operation;
    }
    $result = $command($inputNum) . "\n";
    echo $result;
    $inputNum = $result;
}