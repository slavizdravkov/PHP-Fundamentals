<?php

class Person
{
    private $name;
    private $money;

    /**
     * @var Product[]
     */
    private $bag = [];

    private $shop = [];

    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
    }

    public function getName()
    {
        return $this->name;
    }

    private function setName($name)
    {
        if (strlen($name) == 0){
            throw new Exception("Name cannot be empty");
        }

        $this->name = $name;
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function setMoney($money)
    {
        if ($money < 0){
            throw new Exception("Money cannot be negative");
        }

        $this->money = $money;
    }

    public function addProduct(Product $product)
    {
        $this->bag[] = $product;
    }

    public function __toString():string
    {
        $output = [];
        if (count($this->bag) == 0){
            return $this->name . " - Nothing bought";
        }else{
            foreach ($this->bag as $product) {
                $output[] = $product->getName();
            }
            return $this->name . " - " . implode(",", $output);
        }
    }
}

class Product
{
    private $name;
    private $cost;

    public function __construct(string $name, float $cost)
    {
        $this->setName($name);
        $this->cost = $cost;
    }

    private function setName($name)
    {
        if (strlen($name) == 0){
            throw new Exception("Name cannot be empty");
        }

        $this->name = $name;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Shop
{
    private $purchases = [];

    public function shopping(Person $person, Product $product)
    {
        if ($person->getMoney() < $product->getCost()){
            $this->purchases[] = $person->getName() . " can't afford " . $product->getName();
        }else{
            $person->addProduct($product);
            $this->purchases[] = $person->getName() . " bought " . $product->getName();
            $person->setMoney($person->getMoney() - $product->getCost());
        }
    }

    public function __toString():string
    {
        $output = '';

        foreach ($this->purchases as $purchase) {
            $output .= $purchase . PHP_EOL;
        }

        return $output;
    }
}

$inputLine1 = preg_replace('/[;=]/', ' ', fgets(STDIN));
$inputLine2 = preg_replace('/[;=]/', ' ', fgets(STDIN));

$inputArray1 = explode(' ', trim($inputLine1));
$inputArray2 = explode(' ', trim($inputLine2));

/**
 * @var $persons Person[]
 */
$persons = [];

/**
 * @var $products Product[]
 */
$products = [];

for ($i = 0; $i < count($inputArray1); $i += 2) {
    $name = $inputArray1[$i];
    $money = intval($inputArray1[$i + 1]);

    try{
        $person = new Person($name, $money);
        $persons[$name] = $person;
    }catch (Exception $e){
        echo $e->getMessage() . PHP_EOL;
        exit();
    }
}

for ($i = 0; $i < count($inputArray2); $i += 2) {
    $name = $inputArray2[$i];
    $cost = $inputArray2[$i + 1];

    try{
        $product = new Product($name, $cost);
        $products[$name] = $product;
    }catch (Exception $e){
        echo $e->getMessage() . PHP_EOL;
        exit();
    }
}

$shop = new Shop();
$command = trim(fgets(STDIN));
while ($command !== "END"){
    $commandArgs = explode(' ', $command);

    $personName = $commandArgs[0];
    $productName = $commandArgs[1];

    $product = $products[$productName];
    $person = $persons[$personName];

    $shop->shopping($person, $product);

    $command = trim(fgets(STDIN));
}

echo $shop;
foreach ($persons as $person) {
    echo $person . PHP_EOL;
}
