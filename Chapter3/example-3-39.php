<?php
// generate a time range for this week
$now = time();

// If it's before 3 AM, increment $now, so we don't get caught by DST
// when moving back to the beginning of the week
if (3 < strftime('%H', $now)) { $now += 7200; }

// What day of the week is today?
$today = strftime('%w', $now);

// How many days ago was the start of the week?
$start_day = $now - (86400 * $today);

// Print out each day of the week
for ($i = 0; $i < 7; $i++) {
  print strftime('%c',$start_day + 86400 * $i);
}
?>