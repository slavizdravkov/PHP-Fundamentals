<?php
function isValid($x1, $y1, $x2, $y2):bool {
    $distanceX = $x2 - $x1;
    $distanceY = $y2 - $y1;
    $distance = sqrt(pow($distanceX, 2) + pow($distanceY, 2));
    if ((int)$distance == $distance){ //Проверяваме дали резултата е цяло число
        return true;
    }
    return false;
}
function generateOutpString($x1, $y1, $x2, $y2, bool $valid){
    if ($valid){
        return "{" . $x1 . "}, {" . $y1 . "} to {" . $x2 . "}, {" . $y2 . "} is valid";
    }
    return "{" . $x1 . "}, {" . $y1 . "} to {" . $x2 . "}, {" . $y2 . "} is invalid";
}
$inputCoordinates = array_map('intval', explode(', ', fgets(STDIN)));
$arrayOfCoordinates = [];
for ($i = 0; $i < count($inputCoordinates); $i += 2) {
    $arrayOfCoordinates[] = array($inputCoordinates[$i], $inputCoordinates[$i + 1]);
}
for ($i = 0; $i <= count($arrayOfCoordinates); $i++) {
    if ($i < count($arrayOfCoordinates)){
        $x1 = $arrayOfCoordinates[$i][0];
        $y1 = $arrayOfCoordinates[$i][1];
        $x2 = 0;
        $y2 = 0;
        $valid = isValid($x1, $y1, $x2, $y2);
    }else {
        $x1 = $arrayOfCoordinates[$i - 2][0];
        $y1 = $arrayOfCoordinates[$i - 2][1];
        $x2 = $arrayOfCoordinates[$i - 1][0];
        $y2 = $arrayOfCoordinates[$i - 1][1];
        $valid = isValid($x1, $y1, $x2, $y2);
    }
    $outputString = generateOutpString($x1, $y1, $x2, $y2, $valid);
    echo $outputString . "\n";
}
