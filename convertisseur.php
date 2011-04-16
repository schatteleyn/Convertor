<?php

/* I really simplified the code this time ! */

function convert_first($text) {
    $text = stripcslashes(htmlspecialchars($text)); // Prevent XSS vulnerabilities and un-quote the string
    $linesBefore = explode("\n", $text); // Lines are put in an array
    $linesAfter = array();
    foreach ($linesBefore as $line) {
        $linesAfter[] = ucfirst(strtolower($line)); // For each line, the first character is capitalized and others letters are lowerized
    }
    $text = implode("\n", $linesAfter); // All the modified lines are now put together
    $text = nl2br($text);
    return($text);
}

function convert_every($text) {
    $text = stripcslashes(htmlspecialchars($text)); // Prevent XSS vulnerabilities and un-quote the string
    $linesBefore = explode("\n", $text); // Lines are put in an array
    $linesAfter = array();
    foreach ($linesBefore as $line) {
        $linesAfter[] = ucfirst(strtolower($line)); // For each line, the first character is capitalized and others letters are lowerized
    }
    $text = implode("\n", $linesAfter); // All the modified lines are now put together
    $text = nl2br($text);
    return($text);
}