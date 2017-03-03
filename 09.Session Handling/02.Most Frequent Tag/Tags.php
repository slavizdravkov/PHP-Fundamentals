<?php

class Tags
{
    public function __construct()
    {
        if (!isset($_SESSION["tags"])) {
            $_SESSION["tags"] = [];
        }
    }

    public function getTags():array
    {
        return $_SESSION["tags"];
    }

    public function addTags(array $tags)
    {
        $tagsFromSession = $_SESSION["tags"];
        $_SESSION["tags"] = array_merge($tags, $tagsFromSession);
    }

}