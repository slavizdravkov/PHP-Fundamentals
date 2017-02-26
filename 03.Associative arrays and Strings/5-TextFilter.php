<?php
$text = trim(fgets(STDIN));
$banned = array_map('trim', explode(', ', fgets(STDIN)));
foreach ($banned as $item) {
    $stringAsterisks = str_repeat('*', strlen($item));
    $text = str_replace($item, $stringAsterisks, $text);
    $stringAsterisks = '';
}
echo $text;
//print_r($inputBanlist);
