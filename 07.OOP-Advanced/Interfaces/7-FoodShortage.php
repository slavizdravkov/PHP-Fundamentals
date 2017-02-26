<?php

interface Buyer
{
    public function buyFood();
    public function getFood():int;
}

abstract class Human implements Buyer
{
    protected $name;
    protected $age;
    protected $food = 0;

    protected function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

}
class Citizen extends Human
{
    private $id;
    private $birthdate;

    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        parent::__construct($name, $age);
        $this->id = $id;
        $this->birthdate = $birthdate;
    }

    public function buyFood()
    {
        $this->food += 10;
    }

    public function getFood(): int
    {
        return $this->food;
    }
}

class Rabel extends Human
{
    private $group;

    public function __construct(string $name, int $age, string $group)
    {
        parent::__construct($name, $age);
        $this->group = $group;
    }

    public function buyFood()
    {
        $this->food += 5;
    }

    public function getFood(): int
    {
        return $this->food;
    }
}

$inputLines = intval(fgets(STDIN));

/**
 * @var $humans Buyer[]
 */
$humans = [];
for ($i = 0; $i < $inputLines; $i++) {
    $tokens = explode(" ", trim(fgets(STDIN)));
    $name = $tokens[0];
    $object = null;

    if (count($tokens) < 4){
        $object = new Rabel($name, intval($tokens[1]), $tokens[2]);
    }else{
        $object = new Citizen($name, intval($tokens[1]), $tokens[2], $tokens[3]);
    }

    if (!array_key_exists($name, $humans)){
        $humans[$name] = $object;
    }
}

$inputCommand = trim(fgets(STDIN));

$amountOfFood = [];
while ($inputCommand != "End"){

    foreach ($humans as $name => $human) {
        if ($name === $inputCommand){
            $human->buyFood();
            $amountOfFood[$name] = $human->getFood();
        }
    }
    $inputCommand = trim(fgets(STDIN));
}
$amount = array_sum($amountOfFood);
echo $amount;