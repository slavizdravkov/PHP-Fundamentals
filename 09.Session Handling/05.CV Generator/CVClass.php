<?php


class CVClass
{
    public function getPersonalInformation():array
    {
        return $_SESSION["cv"]["personalInformation"];
    }

    public function addInformation(array $personalInformation, array $lastWorkPosition,
                                   array $languages, array $speakingLanguages, array $drivesCategories)
    {
        $_SESSION["cv"] = ["personalInformation" => $personalInformation,
                            "lastWorkPosition" => $lastWorkPosition,
                            "programmingLanguages" => $languages,
                            "speakingLanguages" => $speakingLanguages,
                            "drivingLicense" => $drivesCategories];
    }

    public function getLastWorkPosition():array
    {
        return $_SESSION["cv"]["lastWorkPosition"];
    }

    public function getLanguages():array
    {
        return $_SESSION["cv"]["programmingLanguages"];
    }

    public function getSpeakingLanguages():array
    {
        return $_SESSION["cv"]["speakingLanguages"];
    }

    public function getDrivingLicense()
    {
        return implode(", ", $_SESSION["cv"]["drivingLicense"]);
    }

    public function isSetCV():bool
    {

        return isset($_SESSION["cv"]["personalInformation"], $_SESSION["cv"]["lastWorkPosition"], $_SESSION["cv"]["programmingLanguages"],
                    $_SESSION["cv"]["speakingLanguages"], $_SESSION["cv"]["drivingLicense"]);

    }
}