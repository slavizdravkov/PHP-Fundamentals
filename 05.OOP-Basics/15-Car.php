<?php

class Car
{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $distance;

    /**
     * Car constructor.
     * @param $speed
     * @param $fuel
     * @param $fuelEconomy
     */
    public function __construct(float $speed, float $fuel, float $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
    }

    public function travel($distance)
    {
        $distanceWithOneLiter = 100 / $this->fuelEconomy;
        $maxDistance = $this->fuel * $distanceWithOneLiter;

        if ($maxDistance >= $distance){
            $usedFuel = $distance * ($this->fuelEconomy / 100);
            $this->distance += $distance;
            $this->fuel -= $usedFuel;
        }else{
            $this->distance += $maxDistance;
            $this->fuel = 0;
        }
    }

    public function refuel(string $fuel)
    {
        $this->fuel += (float)$fuel;
    }

    public function getDistance()
    {
        return number_format($this->distance, 1);
    }

    public function travelTime()
    {
        $timeInMinutes = ($this->distance / $this->speed) * 60;
        $hours = intdiv($timeInMinutes, 60);
        $minutes = fmod($timeInMinutes, 60);
        return "{$hours} hours and {$minutes} minutes";
    }

    public function getFuel()
    {
        return number_format($this->fuel, 1);
    }
}

$inputData = explode(' ', trim(fgets(STDIN)));

$speed = $inputData[0];
$fuel = $inputData[1];
$fuelEconomy = $inputData[2];

$car = new Car($speed, $fuel, $fuelEconomy);
$output = '';

while (true){
    $inputCommand = trim(fgets(STDIN));

    if ($inputCommand == 'END'){
        break;
    }

    $commandArgs = explode(' ', $inputCommand);

    switch ($commandArgs[0]){
        case 'Travel':
            $car->travel($commandArgs[1]);
            break;
        case 'Refuel':
            $car->refuel($commandArgs[1]);
            break;
        case 'Distance':
            $output .= 'Total Distance: ' . $car->getDistance(). PHP_EOL;
            break;
        case 'Time':
            $output .= 'Total Time: ' . $car->travelTime() . PHP_EOL;
            break;
        case 'Fuel':
            $output .= 'Fuel left: ' . $car->getFuel() . ' liters' . PHP_EOL;
            break;
    }
}

echo $output;