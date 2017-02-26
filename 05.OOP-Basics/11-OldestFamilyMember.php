<?php

class Person
{
    private $name;
    private $age;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }

}

class Family
{
    private $people = [];

    public function addMember(Person $person)
    {
        $this->people[] = $person;
    }

    public function getOldestMember()
    {
        /**
         * @var $allMembers Person[]
         */
        $allMembers = $this->people;
        usort($allMembers, function ($a, $b){
            return $a->getAge() < $b->getAge();
        });
        $first = current($allMembers);
        return $first->getName() . ' ' . $first->getAge();
    }
}

$n = intval(trim(fgets(STDIN)));

$family = new Family();
for ($i = 0; $i < $n; $i++) {
    $input = explode(' ', trim(fgets(STDIN)));
    $personName = $input[0];
    $personAge = $input[1];
    $person = new Person($personName, $personAge);
    $family->addMember($person);
}

echo $family->getOldestMember();