<?php

class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct(string $model, string $power, string $displacement = "n/a", string $efficiency = "n/a")
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function getPower(): string
    {
        return $this->power;
    }

    public function setPower(string $power)
    {
        $this->power = $power;
    }

    public function getDisplacement(): string
    {
        return $this->displacement;
    }

    public function setDisplacement(string $displacement)
    {
        $this->displacement = $displacement;
    }

    public function getEfficiency(): string
    {
        return $this->efficiency;
    }

    public function setEfficiency(string $efficiency)
    {
        $this->efficiency = $efficiency;
    }
}

class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct(string $model, Engine $engine, string $weight = "n/a", string $color = "n/a")
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function getEngine(): string
    {
        return $this->engine;
    }

    public function setEngine(string $engine)
    {
        $this->engine = $engine;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function setWeight(string $weight)
    {
        $this->weight = $weight;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function __toString():string
    {
        return $this->getModel() . ':' . PHP_EOL .
        '  ' . $this->engine->getModel() . ':' . PHP_EOL .
        '    Power: ' . $this->engine->getPower() . PHP_EOL .
        '    Displacement: ' . $this->engine->getDisplacement() . PHP_EOL .
        '    Efficiency: ' . $this->engine->getEfficiency() . PHP_EOL .
        '  Weight: ' . $this->getWeight() . PHP_EOL .
        '  Color: ' . $this->getColor() . PHP_EOL;
    }
}

$linesOfEngineInfo = trim(fgets(STDIN));
$enginsInfo = [];
for ($i = 0; $i < $linesOfEngineInfo; $i++) {
    $input = array_map('trim', explode(' ', fgets(STDIN)));
    $model = $input[0];
    $power = intval($input[1]);
    $displacement = "n/a";
    $efficiency = "n/a";
    if (array_key_exists(2, $input)){
        if (is_numeric($input[2])){
            $displacement = intval($input[2]);
        } else{
            $efficiency = $input[2];
        }
    }

    if (array_key_exists(3, $input)){
        $efficiency = $input[3];
    }
    $engin = new Engine($model,
                        $power,
                        $displacement,
                        $efficiency
						);
    $enginsInfo[] = $engin;
}

$linesOfCarsInfo = trim(fgets(STDIN));
$carsInfo = [];
for ($i = 0; $i < $linesOfCarsInfo; $i++) {
    $input = array_map('trim', explode(' ', fgets(STDIN)));
    $model = $input[0];
    $engineName = $input[1];
    $engine = null;
    foreach ($enginsInfo as $item) {
        if ($item->getModel() == $engineName){
            $engine = $item;
        }
    }
    $weight = "n/a";
    $color = "n/a";
    if (array_key_exists(2, $input)){
        if (is_numeric($input[2])){
            $weight = intval($input[2]);
        } else{
            $color = $input[2];
        }
    }

    if (array_key_exists(3, $input)){
        $color = $input[3];
    }
    $car = new Car($model, $engine, $weight, $color);
    echo $car->__toString();
    //$carsInfo[] = $car;
}
