<?php
function removeZeros(string $str) {
    $result = "";
    $found = false;
    for ($i = 0; $i < strlen($str); $i++) { # loop from index 0 to length of the string - 1 
        $item = $str[$i]; # $item is holding the number at the current position 
        # if we found a number other than 0, set $found variable to true 
        if ($item != 0) $found = true; # if $found is true, that means we skipped all the zeros on the left 
        if ($found) $result .= $item; # add the remaining numbers to the $result variable 
    }
    return $result;
}
