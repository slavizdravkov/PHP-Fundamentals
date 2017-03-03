<?php
session_start();
include_once "CVClass.php";
$cv = new CVClass();

if (!isset($_GET["submit"])){
    require_once "InputForm.php";

    exit();
}

//var_dump($_GET);
$get = &$_GET;

$firstName = trim($get["firstName"]);
$lastName = trim($get["lastName"]);
$email = trim($get["email"]);
$phoneNumber = trim($get["phoneNumber"]);
$gender = trim($get["gender"]);
$birthDate = trim($get["birthDate"]);
$nationality = trim($get["nationality"]);
$companyName = trim($get["companyName"]);
$fromDate = trim($get["fromDate"]);
$toDate = trim($get["toDate"]);

$programmingLanguages = [];
for ($i = 0; $i < count($get["programmingLang"]); $i++) {
    if (empty(trim($get["programmingLang"][$i]))){
        continue;
    }

    $programmingLanguages[$get["programmingLang"][$i]] = $get["langSkill"][$i];
}

$otherLanguages = [];
for ($i = 0; $i < count($get["lang"]); $i++) {
    if (empty(trim($get["lang"][$i]))){
        continue;
    }

    $otherLanguages[$get["lang"][$i]] = ["langComprehension" => $get["langComprehension"][$i],
                                         "reading" => $get["langReading"][$i],
                                         "writing" => $get["langWriting"][$i]];
}

$drivingLicense = $get["driversCategory"];

if (regexValidate($firstName, "[a-zA-Z]{2,20}") &&
    regexValidate($lastName, "[a-zA-Z]{2,20}") &&
    regexValidate($companyName, "[a-zA-Z0-9]{2,20}") &&
    regexValidate($phoneNumber, "[0-9\\+\\-\\s]+") &&
    regexValidate($email, "[a-zA-Z0-9]+@[a-zA-Z0-9]+\\.[a-zA-Z0-9]+")){

    $personalInformation = [];
    $personalInformation["First Name"] = $firstName;
    $personalInformation["Last Name"] = $lastName;
    $personalInformation["Email"] = $email;
    $personalInformation["Phone Number"] = $phoneNumber;
    $personalInformation["Gender"] = $gender;
    $personalInformation["Birth Date"] = $birthDate;
    $personalInformation["Nationality"] = $nationality;

    $lastWorkPosition = [];
    $lastWorkPosition["Company Name"] = $companyName;
    $lastWorkPosition["From"] = $fromDate;
    $lastWorkPosition["To"] = $toDate;

    $cv->addInformation($personalInformation, $lastWorkPosition, $programmingLanguages,
                        $otherLanguages, $drivingLicense);
}

function regexValidate(string $text, string $regExp): bool
{
    return preg_match("/{$regExp}/", $text);
}

include_once "CV.php";