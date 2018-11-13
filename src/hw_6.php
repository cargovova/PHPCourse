<?php
$inputPhrase = "Я иду гулять. Мы гуляли, гуляли, но не нагулялись.
И решили погулять ещё.";

if (preg_match('/. \n/', $inputPhrase) === 0 &&
    preg_match('/. /', $inputPhrase) === 1) {
    $outputPhrase = str_replace(". ", ".\n", $inputPhrase);
}
echo $outputPhrase;
$inputArray = explode("\n", $outputPhrase);
echo "<pre>";
print_r($inputArray);
echo "</pre>";
foreach ($inputArray as $value) {
    $count = str_word_count($value);
    echo $count;
}
