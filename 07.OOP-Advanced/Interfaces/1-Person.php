<?php

interface Person
{
    public function getName():string;
    public function getAge():int;
    public function setName($name);
    public function setAge($age);
}

class Citizen implements Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function __toString():string
    {
        $output =   $this->getName() . PHP_EOL .
                    $this->getAge();

        return $output;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
}

$firstLine = trim(fgets(STDIN));
$secondLine = trim(fgets(STDIN));

$citizen = new Citizen($firstLine, $secondLine);

echo $citizen;