#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

$slugifier = new \Slug\Slugifier;

function slugify($string) {
    global $slugifier;
    return $string . ' => ' . $slugifier->slugify($string) . PHP_EOL;
}

echo slugify('Hello world!');
echo slugify('Un titre en bon français !');


/**
 * Brazilian Portuguese example - Just for information
 * 
 * In Portuguese language is very commom to use accentuations
 * an below there's an example how easy is to use this Slugifier.
 * 
 * @global \Slug\Slugifier $slugifier
 * @param type $brazilianString
 * 
 */
function slugifyBR($brazilianString) {
    global $slugifier;
    $slugifier->setTransliterate(true);
    return $brazilianString . ' => ' . $slugifier->slugify($brazilianString) . PHP_EOL;
}


// This is it! a stupidly easy slugifier -- Congrats!
echo slugifyBR('Teste com acentuação');
 