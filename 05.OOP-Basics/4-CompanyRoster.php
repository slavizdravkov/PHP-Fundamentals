<?php

class Employee
{
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;

    public function __construct(string $name,
                                float $salary,
                                string $position,
                                string $department,
                                string $email,
                                int $age)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position)
    {
        $this->position = $position;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function setDepartment(string $department)
    {
        $this->department = $department;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }
}

$countOfLines = intval(trim(fgets(STDIN)));
$employers = [];
while ($countOfLines >= 1){
    $input = array_map('trim', explode(' ', fgets(STDIN)));
    $name = $input[0];
    $salary = floatval($input[1]);
    $position = $input[2];
    $department = $input[3];
    $email = "n/a";
    $age = -1;

    if (array_key_exists(4, $input)){
        if (!is_numeric($input[4])){
            $email = $input[4];
        } else{
            $age = intval($input[4]);
        }
    }

    if (array_key_exists(5, $input)){
        $age = intval($input[5]);
    }

    $employer = new Employee($name,
                                $salary,
                                $position,
                                $department,
                                $email,
                                $age);
    $employers[] = $employer;
    $countOfLines--;
}

$departments = []; // В този масив ще вземем всички департменти
foreach ($employers as $employer) {
    if (!in_array($employer->getDepartment(), $departments)){
        $departments[] = $employer->getDepartment();
    }
}

$departByAverage = []; //Тук ще пазим средните стойности на възнагражденията по департменти
foreach ($departments as $department) {
    $arrayByDepartment = array_filter($employers, function($depart) use ($department){ //В този масив вземаме всички служители от един департмент
       return $depart->getDepartment() == $department;
    });
    $sum = 0.0;
    foreach ($arrayByDepartment as $item) {
        $sum += $item->getSalary();
    }
    $departByAverage[$department] = round($sum / count($arrayByDepartment), 2);//В асоциативния масив добавяме департамента като ключ и следната заплата като стойност
}
$departWithMaxSalary = array_search(max($departByAverage), $departByAverage);//В тази променлива запазваме департмента с най-висока средна заплата
$outputArray = array_filter($employers, function ($empl) use ($departWithMaxSalary){
   return $empl->getDepartment() == $departWithMaxSalary;
});
usort($outputArray, function ($a, $b){ //Сортираме масива в низходящ ред по заплата
   return $a->getSalary() < $b->getSalary();
});
echo "Highest Average Salary: " . $departWithMaxSalary, PHP_EOL;
foreach ($outputArray as $item) {
    echo $item->getName() . " " .
        number_format($item->getSalary(), 2) . " " .
        $item->getEmail() . " " .
        $item->getAge(), PHP_EOL;
}