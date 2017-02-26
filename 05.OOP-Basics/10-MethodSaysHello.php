<?php

class Person
{
    private $name;

    /**
     * Person constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function printHello():string
    {
        return $this->name . ' says "Hello"!';
    }
}

$name = trim(fgets(STDIN));
$person = new Person($name);
$fields = 1;
$methods = 1;
if ($fields != 1 || $methods != 1) {
    throw new Exception("Too many fields or methods");
}
echo $person->printHello();