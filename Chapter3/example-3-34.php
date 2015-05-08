<?php
// Denver, Colorado observes DST
date_default_timezone_set('America/Denver');
// July 4, 2008 is in the summer
$summer = mktime(12,0,0,7,4,2008);
print date('c', $summer) . "\n";
// Phoenix, Arizona does not observe DST
date_default_timezone_set('America/Phoenix');
print date('c', $summer) . "\n";
?>