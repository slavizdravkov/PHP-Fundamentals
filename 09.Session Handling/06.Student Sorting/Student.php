<?php

class Student
{
    private $firstName;
    private $lastName;
    private $email;
    private $examScore;

    public function __construct($firstName, $lastName, $email, float $examScore)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->examScore = $examScore;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getExamScore(): float
    {
        return $this->examScore;
    }
}
