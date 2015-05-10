<?php
// Generate a time range for this month
$now = time();

// If it's before 3 AM, increment $now, so we don't get caught by DST
// when moving back to the beginning of the month
if (3 < strftime('%H', $now)) { $now += 7200; }

// What month is this?
$this_month = strftime('%m',$now);

// Epoch timestamp for midnight on the first day of this month
$day = mktime(0,0,0,$this_month,1);
// Epoch timestamp for midnight on the first day of next month
$month_end = mktime(0,0,0,$this_month+1,1);

while ($day < $month_end) {
  print strftime('%c',$day); 
  $day += 86400;
}
?>