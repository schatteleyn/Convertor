<?php

function nameize($string, $character = '*') {
    return implode($character, array_map(function($ligne) {
                        return ucfirst(trim($ligne));
                    }, explode("\n", $string))) . $character;
}

function suppr($str, $a_char = array('*'/* , ' ' */)) {
    //$str contains the complete raw name string
    //$a_char is an array containing the characters we use as separators for capitalization. If you change it here, change in the two others functions. You can uncomment if you want a capitale letter at every word
    $string = strtolower($str);
    foreach ($a_char as $temp) {
        $pos = strpos($string, $temp);
        if ($pos) {
            //we are in the loop because we found one of the special characters in the array, so lets split it up into chunks and capitalize each one.
            $mend = '';
            $a_split = explode($temp, $string);
            foreach ($a_split as $temp2) {
                //capitalize each portion of the string which was separated at a special character
                $mend .= ucfirst($temp2) . $temp;
            }
            $string = substr($mend, 0, -1);
        }
    }
    return ucfirst($string);
}

function unameize($string, $character = '<br />') {
    return implode($character, array_map(function($ligne) {
                        return ucfirst(trim($ligne));
                    }, explode("*", $string))) . $character;
}

function convert($text) {
    return unameize(suppr(nameize(stripcslashes(htmlspecialchars($text)))));
}
