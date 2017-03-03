<?php
declare(strict_types=1);

$tagsByFrequency = [];
$memoryString = "";
$tempArray = [];
$allTags = [];
if (isset($_GET["submit"])){
    $tags = explode(", ", trim($_GET["tags"]));
    $allTags = $tags;
    if ($_GET["memory"] != ""){
        $tempArray = explode(",", $_GET["memory"]);
        $allTags = array_merge($tags, $tempArray);
    }
    $memoryString = implode(",", $allTags);
    foreach ($allTags as $tag) {
        if (!array_key_exists($tag, $tagsByFrequency)){
            $tagsByFrequency[$tag] = 1;
        }else{
            $tagsByFrequency[$tag]++;
        }
    }
    arsort($tagsByFrequency);
    $mostFrequentTag = array_keys($tagsByFrequency)[0];
}

include_once "FrontEnd.php";