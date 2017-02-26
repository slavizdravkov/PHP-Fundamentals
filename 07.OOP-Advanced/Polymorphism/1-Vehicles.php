<?php

interface DriveInterface
{
    public function vehicleDrive($km);
    public function vehicleRefuel($liters);
    public function getFuel();
}

abstract class Vehicle implements DriveInterface
{
    protected $fuelQuantity;
    protected $fuelConsumption;
    protected $traveledKilometers;
    protected $traveling = [];

    protected function __construct(float $fuelQuantity, float $fuelConsumption)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumption($fuelConsumption);
    }


    public function setFuelQuantity(float $fuelQuantity)
    {
        $this->fuelQuantity = $fuelQuantity;
    }

    public function setFuelConsumption(float $fuelConsumption)
    {
        $this->fuelConsumption = $fuelConsumption;
    }
}

class Car extends Vehicle
{
    public function __construct(float $fuelQuantity, float $fuelConsumption)
    {
        parent::__construct($fuelQuantity, $fuelConsumption);
    }

    public function setFuelConsumption(float $fuelConsumption)
    {
        $this->fuelConsumption = $fuelConsumption + 0.9;
    }


    public function vehicleDrive($km)
    {
        $needFuel = $this->fuelConsumption * $km;
        if ($needFuel < $this->fuelQuantity){
            $this->traveledKilometers += $km;
            $this->traveling[] = "Car travelled {$km} km";
            $this->fuelQuantity -= $needFuel;
        }else{
            $this->traveling[] = "Car needs refueling";
        }
    }

    public function vehicleRefuel($liters)
    {
        $this->fuelQuantity += $liters;
    }

    public function __toString():string
    {
        $output = "";

        foreach ($this->traveling as $item) {
            $output .= $item . PHP_EOL;
        }

        return $output;
    }

    public function getFuel()
    {
        return number_format($this->fuelQuantity, 2);
    }
}

class Truck extends Vehicle
{
    public function __construct(float $fuelQuantity, float $fuelConsumption)
    {
        parent::__construct($fuelQuantity, $fuelConsumption);
    }

    public function setFuelQuantity(float $fuelQuantity)
    {
        $this->fuelQuantity = $fuelQuantity;
    }

    public function setFuelConsumption(float $fuelConsumption)
    {
        $this->fuelConsumption = $fuelConsumption + 1.6;
    }


    public function vehicleDrive($km)
    {
        $needFuel = $this->fuelConsumption * $km;
        if ($needFuel < $this->fuelQuantity){
            $this->traveledKilometers += $km;
            $this->traveling[] = "Truck travelled {$km} km";
            $this->fuelQuantity -= $needFuel;
        }else{
            $this->traveling[] = "Truck needs refueling";
        }
    }

    public function vehicleRefuel($liters)
    {
        $this->fuelQuantity += $liters * 0.95;
    }

    public function getFuel()
    {
        return number_format($this->fuelQuantity , 2);
    }

    public function __toString():string
    {
        $output = "";

        foreach ($this->traveling as $item) {
            $output .= $item . PHP_EOL;
        }

        return $output;
    }
}

$carParameters = explode(" ", trim(fgets(STDIN)));

$fuel = floatval($carParameters[1]);
$consumption = floatval($carParameters[2]);

$car = new Car($fuel, $consumption);

$truckParameters = explode(" ", trim(fgets(STDIN)));

$fuel = floatval($truckParameters[1]);
$consumption = floatval($truckParameters[2]);

$truck = new Truck($fuel, $consumption);

$n = intval(fgets(STDIN));

for ($i = 0; $i < $n; $i++) {
    $tokens = explode(" ", trim(fgets(STDIN)));
    switch ($tokens[1]){
        case "Car":
            $command = "vehicle" . $tokens[0];
            $car->$command(floatval($tokens[2]));
            break;
        case "Truck":
            $command = "vehicle" . $tokens[0];
            $truck->$command(floatval($tokens[2]));
            break;
    }
}

echo $car;
echo $truck;
echo "Car: {$car->getFuel()}" . PHP_EOL;
echo "Truck: {$truck->getFuel()}";