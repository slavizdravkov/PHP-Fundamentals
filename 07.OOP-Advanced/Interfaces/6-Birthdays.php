<?php

interface BirthdayInterface
{
    public function getBirthDate():string;
    public function checkBirthDate($year):bool;
}

class Citizen implements BirthdayInterface
{
    private $name;
    private $birthdate;
    private $age;
    private $id;

    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        $this->name = $name;
        $this->birthdate = $birthdate;
        $this->age = $age;
        $this->id = $id;
    }

    public function getBirthDate(): string
    {
        return $this->birthdate;
    }

    public function checkBirthDate($year): bool
    {
        $birthYear = substr($this->birthdate, -4);
        return  $birthYear === $year;
    }
}

class Robot implements BirthdayInterface
{
    private $model;
    private $id;

    public function __construct(string $model, string $id)
    {
        $this->model = $model;
        $this->id = $id;
    }


    public function getBirthDate(): string
    {

    }

    public function checkBirthDate($year): bool
    {
        return false;
    }
}

class Pet implements BirthdayInterface
{
    private $name;
    private $birthdate;

    public function __construct(string $name, string $birthdate)
    {
        $this->name = $name;
        $this->birthdate = $birthdate;
    }

    public function getBirthDate(): string
    {
        return $this->birthdate;
    }

    public function checkBirthDate($year): bool
    {
        $birthYear = substr($this->birthdate, -4);
        return  $birthYear === $year;
    }
}

/**
 * @var $entries BirthdayInterface[]
 */
$entries = [];

$input = trim(fgets(STDIN));

while ($input != "End"){
    $tokens = explode(" ", $input);

    $inputObject = null;

    switch ($tokens[0]){
        case "Citizen":
            $inputObject = new Citizen($tokens[1], $tokens[2], intval($tokens[3]), $tokens[4]);
            break;

        case "Pet":
            $inputObject = new Pet($tokens[1], $tokens[2]);
            break;

        case "Robot":
            $inputObject = new Robot($tokens[1], $tokens[2]);
            break;
    }
    $entries[] = $inputObject;

    $input = trim(fgets(STDIN));
}

$year = trim(fgets(STDIN));

foreach ($entries as $entry) {
    if ($entry->checkBirthDate($year)){
        echo $entry->getBirthDate() . PHP_EOL;
    }
}