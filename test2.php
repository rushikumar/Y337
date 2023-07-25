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

include "2-#3-LoLSs.php";

echo "<h1>Executing Test Cases </h1>";
echo "<h2>for 2-#3-LoLSs</h2>";

$sol = new Solution();
$testCases = array(
  "",
  " ",
  "abcelsaiox",
  "abcabcbb",
  "pwwkew",
  "bbbbb",
  "dvdf",
  "anviaj",
);

$cntr = 1;
foreach ($testCases as $testCase) {
  echo "<br><hr>";
  echo "<h3>Test Case $cntr &mdash; \"<mark><code>$testCase</code></mark>\"</h3>";
  echo $sol->lengthOfLongestSubstring($testCase);
  $cntr++;
}