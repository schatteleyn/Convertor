<?php
	
function convert($text, $delimiter) {
	
	$text = stripcslashes(htmlspecialchars($text)); // Prevent XSS vulnerabilities and un-quote the string
    $delimiter = htmlspecialchars($delimiter);
    $encode = 'UTF-8';
    
    if ($delimiter == " "){ // If delimiter is a space, no need to execute rest of code, use m_convert_case MB_CASE_TITLE to work with every langages
    	return mb_convert_case(nl2br($text), MB_CASE_TITLE, $encode);
    }
    
    elseif (empty($delimiter)) {
    	$delimiter = "\n";
    }
    
    $linesBefore = explode($delimiter, $text); // Lines are put in an array
    $linesAfter = array();
    foreach ($linesBefore as $line) {
        // mb_ucfirst doesn't exist yet, so we have to be smart. For each line, the first character is capitalized and others letters are lowerized.
        $letter_1 = mb_substr($line, 0, 1);
        $line_end = mb_substr($line, 1);
        $linesAfter[] = mb_strtoupper($letter_1, $encode).mb_strtolower($line_end, $encode);
    }
    $text = implode($delimiter, $linesAfter); // All the modified lines are now put together
    $text = nl2br($text);
    return($text);

}

?>