<?php
function getSpeedLimit($zone){
    switch ($zone){
        case 'city':
            $speedLimit = 50;
            break;
        case 'residential':
            $speedLimit = 20;
            break;
        case 'interstate':
            $speedLimit = 90;
            break;
        case 'motorway':
            $speedLimit = 130;
            break;
        default:
            echo "Not a Valid input";
            $speedLimit = 1000;
    }
    return $speedLimit;
}

function getInfraction ($speed, $limit){
    $overSpeed = $speed - $limit;
    if ($overSpeed < 0){
        $result =  false;
    } else if ($overSpeed >= 0 && $overSpeed <= 20){
        $result =  "speeding";
    } else if ($overSpeed >= 20 && $overSpeed <= 40){
        $result =  "excessive speeding";
    } else {
        $result =  "reckless driving";
    }
    return $result;
}

$inputSpeed = trim(fgets(STDIN));
$inputArea = trim(fgets(STDIN));
$limitOfSpeed = getSpeedLimit($inputArea);
$infraction = getInfraction($inputSpeed, $limitOfSpeed);
if ($infraction){
    echo $infraction;
}
