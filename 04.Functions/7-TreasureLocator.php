<?php
function nameOfLocation($x1, $y1){
    $arrayOfLocations = [
                            'Tokelau' => array(8, 0, 9, 1),
                            'Tuvalu' => array(1, 1, 3, 3),
                            'Samoa'=> array(5, 3, 7, 6),
                            'Tonga' => array(0, 6, 2, 8),
                            'Cook' => array(4, 7, 9, 8)
                        ];
    foreach ($arrayOfLocations as $key => $value) {
        if (($x1 >= $value[0] && $x1 <= $value[2]) && ($y1 >= $value[1] && $y1 <= $value[3])){
            return $key;
        }
    }
    return "On the bottom of the ocean";
}
$inputCoordinates = array_map('floatval', explode(', ', fgets(STDIN)));
$arrayOfCoordinates = [];
for ($i = 0; $i < count($inputCoordinates); $i += 2) {
    $arrayOfCoordinates[] = array($inputCoordinates[$i], $inputCoordinates[$i + 1]);
}
foreach ($arrayOfCoordinates as $coordinate) {
    $outputString = nameOfLocation($coordinate[0], $coordinate[1]);
    echo $outputString . "\n";
}