<?php
if (isset($_GET['result'])){
    $carsArray = preg_split("/[\s,-]+/", $_GET['cars']);
    $colorsOfCars = array('red', 'black', 'green', 'yellow', 'blue');
}

include 'Loops-2-RichPeoplesHTML.php';