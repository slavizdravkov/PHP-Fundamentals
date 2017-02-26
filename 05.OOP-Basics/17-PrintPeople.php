<?php

class Person
{
    private $name;
    private $age;
    private $occupation;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     * @param $occupation
     */
    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function __toString():string
    {
        return $this->name . ' - age: ' . $this->age . ", occupation: " . $this->occupation;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }


}

/**
 * @var $humans Person[]
 */
$humans = [];

while (true){
    $input = trim(fgets(STDIN));

    if ($input == "END"){
        break;
    }

    $humanData = explode(' ', $input);

    $name = $humanData[0];
    $age = intval($humanData[1]);
    $occupation = $humanData[2];

    $human = new Person($name, $age, $occupation);
    $humans[] = $human;
}

usort($humans, function ($a, $b){
    return $a->getAge() > $b->getAge();
});

foreach ($humans as $human) {
    echo $human->__toString() . PHP_EOL;
}