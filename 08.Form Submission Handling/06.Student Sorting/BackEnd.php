<?php
if (!isset($_GET["submit"])){
    require_once "InputForm.php";

    exit();
}

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


$get = &$_GET;

/**
 * @var $students Student[]
 */
$students = [];

for ($i = 0; $i < 3; $i++) {
    $firstName = trim($get["firstName"][$i]);
    $lastName= trim($get["lastName"][$i]);
    $email = trim($get["email"][$i]);
    $examScore = filter_var($get["examScore"][$i], FILTER_VALIDATE_FLOAT);

    $student = new Student($firstName, $lastName, $email, $examScore);

    $students[$firstName . " " . $lastName] = $student;
}


$sortBy = $get["sortBy"];
$order = $get["order"];

if ($sortBy == "firstName"){
    usort($students, function ($a, $b){
        return $a->getFirstName() > $b->getFirstName();
    });

}elseif ($sortBy == "lastName"){
    usort($students, function ($a, $b){
        return $a->getLastName() > $b->getLastName();
    });

}elseif ($sortBy == "email"){
    usort($students, function ($a, $b){
        return $a->getEmail() > $b->getEmail();
    });

}elseif ($sortBy == "examScore"){
    usort($students, function ($a, $b){
        return $a->getExamScore() > $b->getExamScore();
    });
}

if ($order === "descending"){
    array_reverse($students);
}

$arrayOfScores = [];
foreach ($students as $student) {
    $arrayOfScores[] = $student->getExamScore();
}
$averageScore = round(array_sum($arrayOfScores) / count($arrayOfScores), 2);
//var_dump($students);

include_once "OutputForm.php";

