<?php
function textToAssocArray(array $inputArray){
    $outputArray = [];
    for ($i = 0; $i < count($inputArray); $i += 2) {
        $outputArray[$inputArray[$i]] = $inputArray[$i + 1];
    }
    return $outputArray;
}

function generateXML(array $inputArray){

}

$inputText = array_map('trim', explode(',', fgets(STDIN)));
$output = textToAssocArray($inputText);
//print_r($output);
generateXML($output);