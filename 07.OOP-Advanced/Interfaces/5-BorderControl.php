<?php

interface BorderInterface
{
    public function getId():string;
    public function checkId($keyWord):bool;
}

class Citizen implements BorderInterface
{
    private $name;
    private $age;
    private $id;

    public function __construct(string $name, int $age, string $id)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function checkId($keyWord): bool
    {
        $numberOfDigits = strlen($keyWord);
        $lastDigits = substr($this->id, -$numberOfDigits);

        return $lastDigits === $keyWord;
    }
}

class Robot implements BorderInterface
{
    private $model;
    private $id;

    public function __construct(string $model, string $id)
    {
        $this->model = $model;
        $this->id = $id;
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function checkId($keyWord): bool
    {
        $numberOfDigits = strlen($keyWord);
        $lastDigits = substr($this->id, -$numberOfDigits);

        return $lastDigits === $keyWord;
    }
}

/**
 * @var $entries BorderInterface[]
 */
$entries = [];

$input = trim(fgets(STDIN));

while ($input != "End"){
    $tokens = explode(" ", $input);

    if (count($tokens) < 3){
        $robot = new Robot($tokens[0], $tokens[1]);
        $entries[] = $robot;
    }else{
        $citizen = new Citizen($tokens[0], $tokens[1], $tokens[2]);
        $entries[] = $citizen;
    }

    $input = trim(fgets(STDIN));
}

$keyWord = trim(fgets(STDIN));

foreach ($entries as $entry) {
    if ($entry->checkId($keyWord)){
        echo $entry->getId() . PHP_EOL;
    }
}