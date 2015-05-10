<?php
// The beginning of the month in which the credit card expires
$expires = mktime(0, 0, 0, $_POST['month'], 1, $_POST['year']);
// The beginning of next month
// If date('n') + 1 == 13, mktime() does the right thing and uses
// January of the following year.
$nextMonth = mktime(0, 0, 0, date('n') + 1, 1);
if ($expires < $nextMonth) {
   print "Sorry, that credit card expires too soon.";
}
?>