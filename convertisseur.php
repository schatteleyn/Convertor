<?php

function convert($text, $delimiter) {
    $text = stripcslashes(htmlspecialchars($text)); // Prevent XSS vulnerabilities and un-quote the string
    $delimiter = htmlspecialchars($delimiter);
    
    if (empty($delimiter)) {
    	$delimiter = "\n";
    }
    
    $linesBefore = explode($delimiter, $text); // Lines are put in an array
    $linesAfter = array();
    foreach ($linesBefore as $line) {
        $linesAfter[] = ucfirst(strtolower($line)); // For each line, the first character is capitalized and others letters are lowerized
    }
    $text = implode($delimiter, $linesAfter); // All the modified lines are now put together
    $text = nl2br($text);
    return($text);

}