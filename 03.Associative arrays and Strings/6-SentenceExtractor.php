<?php
$text = trim(fgets(STDIN));
$word = trim(fgets(STDIN));
$pattern = '/[A-Z][^\.!?]*[\.!?]/';
preg_match_all($pattern, $text, $matches);

foreach ($matches[0] as $item) {
    $arrayFromItem = explode(' ', $item);
    if (in_array($word, $arrayFromItem)){
        echo $item . "\n";
    }
}