<?php
/**
 * <headerComment>
 *      Author: Rushikumar J. Bhatt
 *      Problem: #3 -- Longest Substring Without Repeating Characters
 *      Copyright (C) 2023 Rushikumar J. Bhatt - All Rights Reserved
 *      You may use, distribute, and/or modify code contained in this
 *      file (below) as long as this header comment either 
 *      (1) Remains intact, unmodified, and accompanies each source 
 *      file where any code in this file (below) is used, or 
 *      (2) Author is credited ("Author: Rushikumar J. Bhatt")
 * </headerComment>
 */

class Solution {

    function findMaxLength($arr) {
        $maxUniqueStr = "";
        $maxUniqueStrLen = 0;
  
        foreach($arr as $uniqueStr) {
            $cStrLen = strlen($uniqueStr);
            $maxUniqueStrLen = ($cStrLen > $maxUniqueStrLen) ? $cStrLen : $maxUniqueStrLen;
        }
        return $maxUniqueStrLen;
    }
  
    /**
     * @param String $s, where s can be empty str, a space, [a-z][A-Z], [0-9], & symbols
     * @return Integer
     * base case: 2, where s = 
     *              1. Empty Str
     *              2. Space
     */
    function lengthOfLongestSubstring($s) {
        /*  * iterate through the string, char by char
                - from start all the way till the nth char
            * set cntr, start counting until char repeats
                - store unique chars in an array, along with their length
                    - so a 2d array, but might just make it a 1d 
                        (with length and a separate array for unique strs?---to keep it simple, for the first iteration?)
                        - or store the maxLength as a var
            * once you reach the last/nth char, grab the max from the array...
            
            Approach #2
            * Iterate through str, char by char, and store each unique substr in an array
            * Iterate through str, char by char, and append each char to a tmp str...
                - if a letter appears again, add the current/tmp str as an array 
                (to the collection of unique substr arrays) and reset the tmp str, appending the current (duplicate) char 
            * when no more chars left, return the max length of array from collection of unique substr arrays 
        */
        //base case: if empty string, return 0
        if(strlen($s) == 0) {
            return 0;
        }
  
        //let's get the string (s) chars into an array
        $uniqueStrs = array();
        $tmpStr = "";
        
        // $maxLengths = array();
        // $maxLength = 0;
  
        //let's keep track of prev char
        $prevChar = "";
        
        $strArr = str_split($s);
        foreach($strArr as $ind => $char) {
            //if(!in_array($char, $uniqueStrs)) {
            if(stristr($tmpStr, $char) === FALSE) {
                $tmpStr .= $char;
                // $maxLength++;
            } else {
                array_push($uniqueStrs, $tmpStr);
                // array_push($maxLengths, $maxLength);
  
                //reset maxLength... as non-unique char was detected and we still might have more chars to iterate through...
                // $maxLength = 1;
                //also, reset the uniqueStr arr
                //$uniqueStrs = array();
  
                if($prevChar == $char) {
                    $tmpStr = $char;
                    // $maxLength = 1;
                } else {
                    $tmpStr = $prevChar.$char;
                    // $maxLength = 2;
                }
  
            }
            $prevChar = $char;
            //add the current maxLength to the maxLengths array
            // array_push($maxLengths, $maxLength);
            //if the current maxLength is not in the maxLengths array, add it...
            //in case there are no more chars, let's add the current tmpStr to the uniqueStrs array...
            if(!isset($strArr[$ind+1])) {
                array_push($uniqueStrs, $tmpStr);
                // array_push($maxLengths, $maxLength);
            }
        }
        //echo "Max: ".max($maxLengths);
  
        //now, we return the max value from the array that kept track of unique substr without repeat
        // return max($maxLengths);
  
        //mixing in some DP
        return $this->findMaxLength($uniqueStrs);
    }
}

?>