<?php
// Find the current time 
$now = time();

// California is 8 hours behind UTC
$now += $pc_timezones['PST'];

// Use gmdate() or gmstrftime() to print California-appropriate time
print gmstrftime('%c',$now);
?>