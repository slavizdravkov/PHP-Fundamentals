<?php

interface CallingInterface
{
    public function numberCalling(string $number);
}

interface BrowsingInterface
{
    public function siteBrowsing(string $site);
}


class Smartphone  implements CallingInterface, BrowsingInterface
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function numberCalling(string $number)
    {
        if (!is_numeric($number)){
            throw new Exception("Invalid number!");
        }

        return "Calling... {$number}" . PHP_EOL;
    }

    public function siteBrowsing(string $site)
    {
        if (preg_match('/[0-9]+/', $site)){
            throw new Exception("Invalid URL!");
        }

        return "Browsing: {$site}!" . PHP_EOL;
    }
}


$inputNumbers = explode(" ", trim(fgets(STDIN)));
$inputSites = explode(" ", trim(fgets(STDIN)));

$smartphone = new Smartphone("HTC");

foreach ($inputNumbers as $inputNumber) {
    try{
        echo $smartphone->numberCalling($inputNumber);
    }catch (Exception $e){
        echo $e->getMessage() . PHP_EOL;
    }
}

foreach ($inputSites as $inputSite) {
    try{
        echo $smartphone->siteBrowsing($inputSite);
    }catch (Exception $e){
        echo $e->getMessage() . PHP_EOL;
    }
}
