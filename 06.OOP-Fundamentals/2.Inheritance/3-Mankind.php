<?php

class Human
{
    private $firstName;
    private $lastName;

    protected function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    protected function getFirstName()
    {
        return $this->firstName;
    }

    protected function setFirstName($firstName)
    {
        if (!ctype_upper($firstName[0])){ //Проверка дали първия символ е главна буква
            throw new Exception("Expected upper case letter!Argument: firstName");
        }

        if (strlen($firstName) < 4){
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }

        $this->firstName = $firstName;
    }

    protected function getLastName()
    {
        return $this->lastName;
    }

    protected function setLastName($lastName)
    {
        if (!ctype_upper($lastName[0])){ //Проверка дали първия символ е главна буква
            throw new Exception("Expected upper case letter!Argument: lastName");
        }

        if (strlen($lastName) < 3){
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }

        $this->lastName = $lastName;
    }
}

class Student extends Human
{
    private $facultyNumber;

    public function __construct(string $firstName, string $lastName, string $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    private function getFacultyNumber()
    {
        return $this->facultyNumber;
    }

    private function setFacultyNumber($facultyNumber)
    {
        if (strlen($facultyNumber) < 5 || strlen($facultyNumber) > 10){
            throw new Exception("Invalid faculty number!");
        }

        $this->facultyNumber = $facultyNumber;
    }

    public function __toString():string
    {
        return  "First Name: " . $this->getFirstName() . PHP_EOL .
                "Last Name: " . $this->getLastName() . PHP_EOL .
                "Faculty number: " . $this->getFacultyNumber() . PHP_EOL;
    }
}

class Worker extends Human
{
    private $weekSalary;
    private $workHoursPerDay;
    private $salaryPerHour;

    public function __construct($firstName, $lastName, float $weekSalary, float $workHoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setLastName($lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHoursPerDay($workHoursPerDay);
        $this->calcSalaryPerHour($weekSalary, $workHoursPerDay);
    }

    protected function setLastName($lastName)
    {
        if (strlen($lastName) < 4){
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }

        parent::setLastName($lastName);
    }

    public function getWeekSalary()
    {
        return $this->weekSalary;
    }

    private function setWeekSalary($weekSalary)
    {
        if ($weekSalary <= 10){
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }

        $this->weekSalary = $weekSalary;
    }

    public function getWorkHoursPerDay()
    {
        return $this->workHoursPerDay;
    }

    private function setWorkHoursPerDay($workHoursPerDay)
    {
        if ($workHoursPerDay < 1 || $workHoursPerDay > 12){
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }

        $this->workHoursPerDay = $workHoursPerDay;
    }

    private function getSalaryPerHour()
    {
        return $this->salaryPerHour;
    }

    private function calcSalaryPerHour($weekSalary, $workHoursPerDay)
    {
        $this->salaryPerHour = round($weekSalary / ($workHoursPerDay * 7), 2);
    }

    public function __toString():string
    {
        return  "First Name: " . $this->getFirstName() . PHP_EOL .
                "Last Name: " . $this->getLastName() . PHP_EOL .
                "Week Salary: " . number_format($this->getWeekSalary(), 2, ".", "") . PHP_EOL .
                "Hours per day: " . number_format($this->getWorkHoursPerDay(), 2) . PHP_EOL .
                "Salary per hour: " . $this->getSalaryPerHour();
    }
}

$firstLine = explode(" ", trim(fgets(STDIN)));
$studentFirsName = $firstLine[0];
$studentLastName = $firstLine[1];
$studentFacultyNumber = $firstLine[2];

$secondLine = explode(" ", trim(fgets(STDIN)));
$workerFirsName = $secondLine[0];
$workerLastName = $secondLine[1];
$workerSalary = $secondLine[2];
$workingHours = $secondLine[3];

try{
    $student = new Student($studentFirsName, $studentLastName, $studentFacultyNumber);
    $worker = new Worker($workerFirsName, $workerLastName, $workerSalary, $workingHours);
    echo $student;
    echo PHP_EOL;
    echo $worker;
}catch (Exception $e){
    echo $e->getMessage() . PHP_EOL;
}