<?php
session_start();

include_once "Students.php";
$students = new Students();

if (isset($_GET["submit"])) {

    $get = &$_GET;

    /**
     * @var $students Student[]
     */
    $studentsArray = [];

    for ($i = 0; $i < 3; $i++) {
        $firstName = trim($get["firstName"][$i]);
        $lastName = trim($get["lastName"][$i]);
        $email = trim($get["email"][$i]);
        $examScore = filter_var($get["examScore"][$i], FILTER_VALIDATE_FLOAT);

        include_once "Student.php";
        $student = new Student($firstName, $lastName, $email, $examScore);

        $studentsArray[$firstName . " " . $lastName] = $student;
    }

    $students->addStudents($studentsArray);

    $sortBy = $get["sortBy"];
    $order = $get["order"];

    if ($sortBy == "firstName") {

        $studentsArray = $students->sortByFirstName();

    } elseif ($sortBy == "lastName") {

        $studentsArray = $students->sortByLastName();

    } elseif ($sortBy == "email") {

        $studentsArray = $students->sortByEmail();

    } elseif ($sortBy == "examScore") {

        $studentsArray = $students->sortByExamScore();
    }

    if ($order === "descending") {
        array_reverse($studentsArray);
    }

    $arrayOfScores = [];
    foreach ($studentsArray as $student) {
        $arrayOfScores[] = $student->getExamScore();
    }
    $averageScore = round(array_sum($arrayOfScores) / count($arrayOfScores), 2);
}
//var_dump($students);

include_once "InputForm.php";