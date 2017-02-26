<?php

interface IPerson
{
    public function getName():string;
    public function getAge():int;
    public function setName($name);
    public function setAge($age);
}

interface IIdentifiable
{
    public function getId():string;

    public function setId($id);
}

interface IBirthable
{
    public function getBirthdate():string;

    public function setBirthdate($birthDate);
}

class Citizen implements IPerson, IIdentifiable, IBirthable
{
    private $name;
    private $age;
    private $id;
    private $birthDate;

    public function __construct(string $name, int $age, string $id, string $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthDate);
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBirthdate(): string
    {
        return $this->birthDate;
    }

    public function setBirthdate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function __toString():string
    {
        return  $this->getName() . PHP_EOL .
                $this->getAge() . PHP_EOL .
                $this->getId() . PHP_EOL .
                $this->getBirthdate();
    }
}

$name = trim(fgets(STDIN));
$age = trim(fgets(STDIN));
$id = trim(fgets(STDIN));
$birthDate = trim(fgets(STDIN));

$citizen = new Citizen($name, $age, $id, $birthDate);

echo $citizen;