<?php
// Find the current UTC time 
$now = time();

// California is 8 hours behind UTC
$now -= 8 * 3600;

// Is it DST? 
$ar = localtime($now,true);
if ($ar['tm_isdst']) { $now += 3600; }

// Use gmdate() or gmstrftime() to print California-appropriate time
print gmstrftime('%c',$now);
?>