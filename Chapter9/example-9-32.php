<?php
$timestamp = mktime(0, 0, 0, 10, 30, 2008); // October 30, 2008
$one_day = 60 * 60 * 24; // number of seconds in a day

// print out one week's worth of days
for ($i = 0; $i < 7; ++$i) {
    $date = date("D, F j, Y", $timestamp);
    print "<option value='$timestamp'>$date</option>\n";
    $timestamp += $one_day;
}
?>
