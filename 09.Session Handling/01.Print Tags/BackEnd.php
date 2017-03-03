<?php
session_start();
require_once "Tags.php";
$tags = new Tags();
$tags->addTags([]);

if (isset($_GET["submit"])){
    $tags->addTags(preg_split('/[,\s]+/', trim($_GET["tags"])));
}

require_once "FrontEnd.php";