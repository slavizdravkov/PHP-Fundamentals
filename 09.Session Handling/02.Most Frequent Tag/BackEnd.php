<?php
declare(strict_types=1);
session_start();

require_once "Tags.php";
$tags = new Tags();
//$_SESSION["tags"] = [];
//$tags->addTags([]);

$tagsByFrequency = [];
$allTags = [];
if (isset($_GET["submit"])){
    $tags->addTags(explode(", ", trim($_GET["tags"])));

    $allTags = $tags->getTags();

    foreach ($allTags as $tag) {

        if (!array_key_exists($tag, $tagsByFrequency)){
            $tagsByFrequency[$tag] = 0;
        }

        $tagsByFrequency[$tag]++;
    }
    arsort($tagsByFrequency);
    $mostFrequentTag = array_keys($tagsByFrequency)[0];
}

if (isset($_GET["clear"])){
    $tagsByFrequency = [];
    $mostFrequentTag = "";
    session_unset();
    $tags = new Tags();
}

include_once "FrontEnd.php";