<?php

class Human
{
    /**
     * @var string
     */
    private $humanName;

    /**
     * @var Company
     */
    private $company = null;

    /**
     * @var array(Pokemon)
     */
    private $pokemons = [];

    /**
     * @var array(Children)
     */
    private $children = [];

    /**
     * @var array(Parents)
     */
    private $parents = [];

    /**
     * @var Car
     */
    private $car = null;

    /**
     * Human constructor.
     * @param string $humanName
     * @param Company $company
     * @param Car $car
     */
    public function __construct(string $humanName)
    {
        $this->humanName = $humanName;
    }

    /**
     * @return string
     */
    public function getHumanName(): string
    {
        return $this->humanName;
    }

    /**
     * @param string $humanName
     */
    public function setHumanName(string $humanName)
    {
        $this->humanName = $humanName;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return array
     */
    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    public function setPokemons(Pokemon $pokemon)
    {
        $this->pokemons[] = $pokemon;
    }

    /**
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    public function setChildren(Children $children)
    {
        $this->children[] = $children;
    }

    /**
     * @return array
     */
    public function getParents(): array
    {
        return $this->parents;
    }

    public function setParents(Parents $parentS)
    {
        $this->parents[] = $parentS;
    }

    /**
     * @return Car
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param Car $car
     */
    public function setCar(Car $car)
    {
        $this->car = $car;
    }


}

class Company
{
    private $companyName;
    private $department;
    private $salary;

    /**
     * Company constructor.
     * @param $companyName
     * @param $department
     * @param $salary
     */
    public function __construct(string $companyName, string $department, float $salary)
    {
        $this->companyName = $companyName;
        $this->department = $department;
        $this->salary = $salary;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment(string $department)
    {
        $this->department = $department;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param float $salary
     */
    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function __toString():string
    {
        return $this->getCompanyName() . ' ' . $this->getDepartment() . ' ' . number_format($this->getSalary(), 2);
    }

}

class Pokemon
{
    private $pokemonName;
    private $type;

    /**
     * Pokemon constructor.
     * @param $pokemonName
     * @param $type
     */
    public function __construct(string $pokemonName, string $type)
    {
        $this->pokemonName = $pokemonName;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getPokemonName(): string
    {
        return $this->pokemonName;
    }

    /**
     * @param string $pokemonName
     */
    public function setPokemonName(string $pokemonName)
    {
        $this->pokemonName = $pokemonName;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function __toString():string
    {
        return $this->pokemonName . ' ' . $this->type;
    }

}

class Parents
{
    private $parentsName;
    private $parenthsBirthday;

    /**
     * Parents constructor.
     * @param $parentsName
     * @param $parenthsBirthday
     */
    public function __construct(string $parentsName, string $parenthsBirthday)
    {
        $this->parentsName = $parentsName;
        $this->parenthsBirthday = $parenthsBirthday;
    }

    /**
     * @return string
     */
    public function getParentsName(): string
    {
        return $this->parentsName;
    }

    /**
     * @param string $parentsName
     */
    public function setParentsName(string $parentsName)
    {
        $this->parentsName = $parentsName;
    }

    /**
     * @return string
     */
    public function getParenthsBirthday(): string
    {
        return $this->parenthsBirthday;
    }

    /**
     * @param string $parenthsBirthday
     */
    public function setParenthsBirthday(string $parenthsBirthday)
    {
        $this->parenthsBirthday = $parenthsBirthday;
    }

    public function __toString():string
    {
        return $this->parentsName . ' ' . $this->parenthsBirthday;
    }

}

class Children
{
    private $childName;
    private $childBirthday;

    /**
     * Children constructor.
     * @param $childName
     * @param $childBirthday
     */
    public function __construct(string $childName, string $childBirthday)
    {
        $this->childName = $childName;
        $this->childBirthday = $childBirthday;
    }

    /**
     * @return string
     */
    public function getChildName(): string
    {
        return $this->childName;
    }

    /**
     * @param string $childName
     */
    public function setChildName(string $childName)
    {
        $this->childName = $childName;
    }

    /**
     * @return string
     */
    public function getChildBirthday(): string
    {
        return $this->childBirthday;
    }

    /**
     * @param string $childBirthday
     */
    public function setChildBirthday(string $childBirthday)
    {
        $this->childBirthday = $childBirthday;
    }

    public function __toString():string
    {
        return $this->childName . ' ' . $this->childBirthday;
    }

}

class Car
{
    private $carName;
    private $carSpeed;

    /**
     * Car constructor.
     * @param $carName
     * @param $carSpeed
     */
    public function __construct(string $carName, int $carSpeed)
    {
        $this->carName = $carName;
        $this->carSpeed = $carSpeed;
    }

    /**
     * @return string
     */
    public function getCarName(): string
    {
        return $this->carName;
    }

    /**
     * @param string $carName
     */
    public function setCarName(string $carName)
    {
        $this->carName = $carName;
    }

    /**
     * @return int
     */
    public function getCarSpeed(): int
    {
        return $this->carSpeed;
    }

    /**
     * @param int $carSpeed
     */
    public function setCarSpeed(int $carSpeed)
    {
        $this->carSpeed = $carSpeed;
    }

    public function __toString():string
    {
        return $this->carName . ' ' . $this->carSpeed;
    }

}

/**
 * @var $humans Human[]
 */
$humans = [];
while (true){
    $input = trim(fgets(STDIN));

    if ($input == 'End'){
        break;
    }

    $inputData = explode(' ', $input);

    $name = $inputData[0];
    $argument = $inputData[1];
    $company = null;
    $car = null;
    $pokemon = null;
    $parents = null;
    $children = null;

    switch ($argument){
        case 'company':
            $companyName = $inputData[2];
            $departmentName = $inputData[3];
            $cashSalary = floatval($inputData[4]);
            $company = new Company($companyName, $departmentName, $cashSalary);
            break;
        case 'car':
            $nameOfCar = $inputData[2];
            $speedOfCar = intval($inputData[3]);
            $car = new Car($nameOfCar, $speedOfCar);
            break;
        case 'pokemon':
            $pokemonName = $inputData[2];
            $pokemonType = $inputData[3];
            $pokemon = new Pokemon($pokemonName, $pokemonType);
            break;
        case 'parents':
            $parentsName = $inputData[2];
            $parentsBirthday = $inputData[3];
            $parents = new Parents($parentsName, $parentsBirthday);
            break;
        case 'children':
            $childrenName = $inputData[2];
            $childrenBirthday = $inputData[3];
            $children = new Children($childrenName, $childrenBirthday);
            break;
    }

    $human = new Human($name);

    if (array_key_exists($name, $humans)){
        if (isset($company)){
            $humans[$name]->setCompany($company);
        }

        if (isset($car)){
            $humans[$name]->setCar($car);
        }

        if (isset($pokemon)){
            $humans[$name]->setPokemons($pokemon);
        }

        if (isset($parents)){
            $humans[$name]->setParents($parents);
        }

        if (isset($children)){
            $humans[$name]->setChildren($children);
        }
    }else{

        if (isset($company)){
            $human->setCompany($company);
        }

        if (isset($car)){
            $human->setCar($car);
        }

        if (isset($pokemon)){
            $human->setPokemons($pokemon);
        }

        if (isset($parents)){
            $human->setParents($parents);
        }

        if (isset($children)){
            $human->setChildren($children);
        }

        $humans[$name] = $human;
    }
}
$humans = array_filter($humans, function ($a){
   return $a !== null;
});

$nameToPrint = trim(fgets(STDIN));

foreach ($humans as $human) {
    if ($human->getHumanName() == $nameToPrint){
        echo $human->getHumanName() . PHP_EOL;
        echo 'Company:' . PHP_EOL;
        $company = $human->getCompany();
        if ($company !== null){
            echo $company->__toString() . PHP_EOL;
        }
        echo 'Car:' . PHP_EOL;
        $car = $human->getCar();
        if ($car !== null){
            echo $car->__toString() . PHP_EOL;
        }
        echo 'Pokemon:' . PHP_EOL;
        $pokemonCollection = $human->getPokemons();
        if (is_array($pokemonCollection)){
            foreach ($pokemonCollection as $item) {
                echo $item->__toString() . PHP_EOL;
            }
        }
        echo 'Parents:' . PHP_EOL;
        $parents = $human->getParents();
        if (is_array($parents)){
            foreach ($parents as $item) {
                echo $item->__toString() . PHP_EOL;
            }
        }
        echo 'Children:' . PHP_EOL;
        $children = $human->getChildren();
        if (is_array($children)){
            foreach ($children as $item) {
                echo $item->__toString() . PHP_EOL;
            }
        }
    }
}