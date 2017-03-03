<?php

class Tags
{
    public function getTags():array
    {
        return $_SESSION["tags"];
    }

    public function addTags(array $tags)
    {
        $_SESSION["tags"] = $tags;
    }
}