<?php
$inputArray = array_map('trim', explode(' ', fgets(STDIN)));
$sum = 0;
for ($i = 0; $i < count($inputArray); $i++) {
    $sum += intval(strrev($inputArray[$i]));
}
echo $sum;