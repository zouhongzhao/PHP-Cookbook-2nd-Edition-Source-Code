<?php
list($hour, $minute, $second, $month, $day, $year) = 
                                  split(':', date('h:i:s:m:d:Y'));
// print out one week's worth of days
for ($i = 0; $i < 7; ++$i) {
    $timestamp = mktime($hour, $minute, $second, $month, $day + $i, $year); 
    $date = date("D, F j, Y", $timestamp);
    print "<option value='$timestamp'>$date</option>\n";
}
?>
