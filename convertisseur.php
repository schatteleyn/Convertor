<?php

function convert($text, $delimiter) {
    $text = stripcslashes(htmlspecialchars($text)); // Prevent XSS vulnerabilities and un-quote the string
    $delimiter = htmlspecialchars($delimiter);
    
    if (empty($delimiter)) {
    	$delimiter = "\n";
    }
    
    else if ($delimiter = " "){ // If delimiter is a space, no need to execute rest of code, directly use ucwords
    	return ucwords(mb_strtolower(nl2br($text), 'UTF-8'));
    }
    
    $linesBefore = explode($delimiter, $text); // Lines are put in an array
    $linesAfter = array();
    foreach ($linesBefore as $line) {
    	$linesAfter[] = ucfirst(mb_strtolower($text, 'UTF-8'));
    }
    $text = implode($delimiter, $linesAfter); // All the modified lines are now put together
    $text = nl2br($text);
	return ($text);
}