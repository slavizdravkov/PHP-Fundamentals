<?php

class Students
{
    public function addStudents($students)
    {
        $_SESSION["students"] = $students;
    }

    public function sortByFirstName():array
    {
        usort($_SESSION["students"], function ($a, $b){
            return $a->getFirstName() > $b->getFirstName();
        });

        return $_SESSION["students"];
    }

    public function sortByLastName():array
    {
        usort($_SESSION["students"], function ($a, $b){
            return $a->getLastName() > $b->getLastName();
        });

        return $_SESSION["students"];
    }

    public function sortByEmail():array
    {
        usort($_SESSION["students"], function ($a, $b){
            return $a->getEmail() > $b->getEmail();
        });

        return $_SESSION["students"];
    }

    public function sortByExamScore():array
    {
        usort($_SESSION["students"], function ($a, $b){
            return $a->getExamScore() > $b->getExamScore();
        });

        return $_SESSION["students"];
    }

}