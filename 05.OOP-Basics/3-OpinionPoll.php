<?php
class Person
{
    private $name;
    private $age;

    public function __construct($name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(){
        return $this->name;
    }

    public function getAge(){
        return $this->age;
    }
}
$countOfLines = intval(trim(fgets(STDIN)));
$persons = [];
while ($countOfLines >= 1){
    $input = array_map('trim', explode(' ', fgets(STDIN)));
    $name = $input[0];
    $age = intval($input[1]);
    if ($age > 30){
        $person = new Person($name, $age);
        $persons[] = $person;
    }
    $countOfLines--;
}
usort($persons, function ($a, $b){
    return $a->name > $b->name;
});
foreach ($persons as $person) {
    echo $person->name . " - " . $person->age . "\n";
}
//var_dump($persons);