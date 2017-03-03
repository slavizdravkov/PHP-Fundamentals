<?php

if (isset($_GET["tags"])){
    $tags = preg_split('/[,\s]+/', trim($_GET["tags"]));
}

require_once "FrontEnd.php";